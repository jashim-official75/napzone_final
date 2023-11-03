import Player from './Player.js';
import {rand,min,lerp} from './Utils.js';
import {toLayout} from './Main.js';

export default class MainScene{

	constructor(runtime)
	{
		this.runtime  = runtime;
		this.player = new Player(runtime,this);
		
		this.tiles = [];
		this.nextColorBar = rand(3,5);
		this.score = 0;
		this.camera = runtime.objects.Camera.getFirstInstance();
		this.runtime.globalVars.state = "none";
		this.lastObstacleY = 500;
		this.camera.y = runtime.layout.height/2;
		
		
		//Get All Obstacles and Bound Boxes to Spwan Randomly later
const objects = Array.from(runtime.objects.Objects.instances());
const bounds = Array.from(runtime.objects.BoundBox.instances());
// const stars = Array.from(runtime.objects.star.instances());

this.boundBoxes  = bounds.map(b=> {
	return {
		height:b.height,
		objects: objects.filter(obs=> obs.x<=b.width/2 + b.x && obs.x>= b.x-b.width/2 && obs.y<=b.height/2 + b.y && obs.y>= b.y-b.height/2).map(obs=>{
		return {
			relX: obs.x - b.x,
			relY:obs.y - b.y,
			object :obs
		};
		
		}
		)

	};
});

		
		
	}
	
	
		//Sent the Event to Event Sheet
	sendEvent(event)
	{
		const eventObj = this.runtime.objects.SimpleEvent.createInstance(0,0,0);
		eventObj.instVars.EventName = event;
		eventObj.destroy();
	}
	
	createObstacles()
	{
		const count = rand(3,5);


	for(let i=0;i<count;i++)
	{
		const box = this.boundBoxes[rand(0,this.boundBoxes.length)];
		const y = this.lastObstacleY - box.height/2;
		const x = this.runtime.layout.width/2;
		box.objects.forEach(obs=>{
		const ist = obs.object.objectType.createInstance(1,x + obs.relX,y+obs.relY);
		ist.angle = obs.object.angle;
		ist.width = obs.object.width;
		ist.height = obs.object.height;
		
		if(!obs.object.instVars)
			return;
		const keys = Object.keys(obs.object.instVars);
		
		for(const key of keys)
		{
			ist.instVars[key] = obs.object.instVars[key];
			console.log(key);
		}
		if(typeof ist.init === "function")
		ist.init();
	});
	

	this.lastObstacleY =this.lastObstacleY-box.height; 
	}	
	}
	
	cleanUpObstaclesIfCan()
	{
	//destroy earlier objects
	const cam = this.runtime.objects.Camera.getFirstInstance();

	Array.from(this.runtime.objects.Obstacle.instances()).filter(item=>
	item.layer == 1 &&
	item.y>cam.y+this.runtime.layout.height).forEach(item=>item.destroy());

// 	Array.from(this.runtime.objects.star.instances()).filter(item=>
// 	item.layer == 1 &&
// 	item.y>cam.y+this.runtime.layout.height).forEach(item=>item.destroy());
	}
	
	
	startPlay()
	{
		this.runtime.globalVars.state = "play";
		this.player.active = true;
	}
	
	tick(runtime)
	{
		this.player.update(runtime.dt);
		const point = toLayout(this.player.position);//.add(new Vector(runtime.layout.width/2,runtime.layout.height/2));
		this.camera.x =  runtime.layout.width/2;
		this.camera.y = lerp(this.camera.y, min(point.y - 100,this.camera.y),10*runtime.dt);
	
	
		if(this.lastObstacleY  > this.camera.y - runtime.layout.height/2)
		{
		
			this.createObstacles();
		}
		
		this.cleanUpObstaclesIfCan();
	}
	
	async onPlayerDie()
	{
		
		this.player.destroy();
		this.runtime.globalVars.state = "over";

const lastBestScore = await this.runtime.storage.getItem("bestScore");
		if(this.score>lastBestScore)
		{
			await this.runtime.storage.setItem("bestScore",this.score);
		}
		this.sendEvent("GameOver");
		
	}

}