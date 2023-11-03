import Vector from './Vector.js';
import Path from './Path.js';
import {toLayout,toWorldWidth,inputController,worldWidth,toWorld,scene} from'./Main.js';
import {maxVisiblePartCount,speed,startUpPartCount,speedIncreaseRate,maxSpeed,snakeDamageRate} from './Settings.js';
import {min,abs,max} from './Utils.js';


export default class Player{

	constructor(runtime,scene)
	{
		this.active = false;
		this.scene = scene;
		this.runtime = runtime;
		this.path = new Path(); //path for snake
		this.parts = []; // all parts of snake
		this.position = new Vector(worldWidth()/2,2.8); // world position
		
		const pos = toLayout(this.position);
		this.partRadius = toWorldWidth(20);
		this.maxPartVisibleCount = maxVisiblePartCount;
		
		this.playerHead = this.runtime.objects.circle.getFirstInstance();
		this.playerHead.x = pos.x;
		this.playerHead.y = pos.y;
		this.headOffset = 0;
		
		this.currentSpeed = speed;
		this.partCount = 0;
		this.timeWaitToDestroy = 0;
		this.partCountTxt = runtime.objects.PartCountTxt.getFirstInstance();
		
		this.addParts(startUpPartCount);
		
		
		this.updatePartCount();
		
		inputController.onMoveListener = this.onMoveDelta;
	}
	
	//update part count text
	updatePartCount()
	{
		const pos = toLayout(this.position);
		this.partCountTxt.x = pos.x;
		this.partCountTxt.y = pos.y - 22;
		this.partCountTxt.text = this.partCount +"";
	}
	
	
	//add Parts -
	addParts(count)
	{
		this.partCount += count;
		
		// if count exceed max visible count don't add it
		if(this.parts.length + count <= this.maxPartVisibleCount)
		{
			this.createTileParts(count);
		}
		else
		{
			this.createTileParts(this.maxPartVisibleCount - this.parts.length);
		}
	}
	
	
	//Create Tile Parts
	createTileParts(count)
	{
		const targetX = this.parts.length > 0 ?this.parts[this.parts.length-1].x : this.playerHead.x; 
		const targetY = this.parts.length > 0 ?this.parts[this.parts.length-1].y : this.playerHead.y;
		
		for(let i=0;i<count;i++)
		{
			const p = this.runtime.objects.Part.createInstance(1,targetX,targetY);
			p.x = targetX;
			p.y = targetY;
			this.parts.push(p);
		}
	}
	

	
	
	onMoveDelta(delta)
	{
		const p = scene.player;
	
	if(!p.active)
	return;
	
	let totalDeltaX = abs(delta.x);
	
	//To avoid missing collision change the Position based on bound can change
	while(totalDeltaX>0)
	{
		const currenDelatX =  min(totalDeltaX,p.playerHead.width/2);
		totalDeltaX -= currenDelatX;
		const point = new Vector(p.position.x + toWorldWidth(delta.x>0?currenDelatX : -currenDelatX ),p.position.y);
		point.x = point.x<p.partRadius/2 ? p.partRadius/2 : point.x>worldWidth()-p.partRadius/2?	worldWidth() -				p.partRadius/2:point.x;
				
				
				p.position = point;
			p.updateCollisions();
	}		
			p.updateSnake();
		
	}
	
	update(dt)
	{
		
		if(!this.active)
		{
			return;
		}
		const targetSpeed = this.currentSpeed + speedIncreaseRate*dt;
		this.currentSpeed =targetSpeed>maxSpeed ? maxSpeed : targetSpeed;
		this.position =	 this.position.add(new Vector(0,this.currentSpeed*dt));
		
		
	
		this.timeWaitToDestroy -= dt;
		
		if(!this.active)
		{
			return;
		}
		
		this.updateCollisions(dt);
		this.updateSnake(dt);
		this.updatePartCount();
		
	}
	

	
	//update total collision
	updateCollisions(_)
	{
		this.updateAvoidObstacles();
		this.updateCollectParts();
	}
	
	//update points
	updateCollectParts()
	{
		for(const obj of this.runtime.objects.Points.instances())
		{
			if(obj.testOverlap(this.playerHead))
			{
			
				this.addParts(obj.instVars.Value);
				obj.destroy();
				this.playSound("coin_collect_clip");
				break;
			}
		}
	}
	
	
	//Update Snake Collision with obstacles
	updateAvoidObstacles(_)
	{
		this.playerHead.x = toLayout(this.position).x;
		this.playerHead.y =  toLayout(this.position).y;
			
			const lastPlayerHeadPos = new Vector(this.playerHead.x,this.playerHead.y);
		
		//find collision and update the position to avoid collision
		for(const obj of this.runtime.objects.Obstacle.instances())
		{
			
			if(obj.testOverlap(this.playerHead) )
			{
				const isTop = (obj.y  + obj.height/2 - this.playerHead.height/6 ) < this.playerHead.y;
				
				if(isTop)
				{
					const pos = toWorld(new Vector(0,obj.y  + obj.height/2 + this.playerHead.height/2));
					this.position = new Vector(this.position.x,pos.y+0.01);
					
					
					//If Obstacle is Tile the Hit the Tile
					if(obj.objectType === this.runtime.objects.Tile)
					{
						if(this.timeWaitToDestroy <=0) //Hit after time interval
						{
							if(this.partCount>0)
								this.destroyPart();
							else
							{
								scene.onPlayerDie();
							}
							obj.hit();
							this.scene.score++;
							this.timeWaitToDestroy = 1/snakeDamageRate;
						}
					}
					
					return;
				}
				
				
				const isLeft = this.playerHead.x > obj.x;
				
				const xPos = toWorld(new Vector( isLeft ? obj.x + obj.width/2+this.playerHead.width/2 : obj.x - 	obj.width/2-this.playerHead.width/2 ,this.position.y)).x;
				this.position.x = xPos;
				break;
			}
		}
		
		this.playerHead.x = lastPlayerHeadPos.x;
		this.playerHead.y = lastPlayerHeadPos.y;
		
	}
	
	
	//Update the Snake(part head,Parts) on Path
	updateSnake(dt)
	{
		//Reduce Head offset if has
		if(this.headOffset>0)
		{
			this.headOffset = max(this.headOffset-3*dt,0);
			console.log(this.headOffset);
		}
	
		if(this.path.count()>0)
		{
			if(this.path.get(0).sub(this.position).mag()>0)
			{
				this.path.insert(0,this.position.clone());
			}
		}
		else{
			this.path.insert(0,this.position.clone());
		}
		
			//Remove from path if count exceed max limit
		    while (this.path.count() > 500)
            {
                this.path.removeAt(this.path.count() - 1);
            }
			
			//find the points for Player Head and Parts
			const points = this.path.findSegmentPoints(this.partRadius,this.parts.length+1,this.headOffset,this.partRadius*1.02
			);
			
			if(points)
			{
				const headPoint = toLayout(points.length > 0 ? points[0] : this.path.get(0));
				this.playerHead.x = headPoint.x;
				this.playerHead.y = headPoint.y;
				
				
				for(let i=1;i<points.length;i++)
				{
					const point = toLayout(points[i]);
					
					//update the position if already moving or the y position grater
					if(this.parts[i-1].instVars.StartedMoving===0)
					{
						if(this.parts[i-1].y < point.y)
						{
							continue;
						}
						else
						{
							this.parts[i-1].instVars.StartedMoving = 1;
						}
					}
					
					this.parts[i-1].x = point.x;
					this.parts[i-1].y = point.y;
				}
			}

	}
	
	
	//destroy the single Part
	destroyPart()
	{

		this.partCount--;
		const part = this.parts[0];
		
		//Particles
		const effect = this.runtime.objects.PartDieEffect.createInstance(1,this.playerHead.x,this.playerHead.y);
		effect.colorRgb = part.colorRgb;
		
		
		part.destroy();
		this.parts.splice(0,1);
		
		this.headOffset = toWorldWidth(this.playerHead.height);
		
		
		//Create tile Parts if Parts Exceeed Max Visible Parts
		if(this.partCount>=this.maxPartVisibleCount)
		{
			this.createTileParts(this.maxPartVisibleCount - this.parts.length);
		}
		
		
		this.playSound("hit_clip");
		
	}
	
		//Play sound effect
	playSound(name)
	{
	if(!this.runtime.globalVars.sounOn)
	return;
		const ist = this.runtime.objects.SoundEffect.createInstance(0,0,0);
		ist.instVars.name = name;
		ist.destroy();
	}


	//destroy player
	destroy()
	{
		this.partCountTxt.destroy();
	
		this.active = false;
		const inst = this.runtime.objects.player_die_effect.createInstance(0,0,0);
					inst.x = this.playerHead.x;
					inst.y = this.playerHead.y;
					
		this.playerHead.destroy();
		this.parts.forEach(p=>p.destroy());
	}

}