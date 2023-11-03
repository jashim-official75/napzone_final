import {rand} from './Utils.js';
import {getColorValue} from './Main.js';

//Spite instance class for Tile
export default class Tile extends ISpriteInstance{
	
	constructor()
	{
		super();
		//create text and cache it
		this.text =  this.runtime.objects.TileTxt.createInstance(1,this.x,this.y);
		
	}
	
	//init the value
	init()
	{
		this.instVars.Value = rand(this.instVars.MinValue,this.instVars.MaxValue); //set random value between min and max
		this.update();
	}
	
	//hit call by Player script
	hit()
	{
		this.instVars.Value--;
		if(this.instVars.Value>0)
		{
		this.update();
		}
		else
		{
			this.text.destroy();
			
			//effect
			const effect = this.runtime.objects.TileDieEffect.createInstance(1,this.x,this.y);
			effect.colorRgb = this.colorRgb;
			
			this.destroy();
		}
	}
	
	update()
	{
	this.text.text = this.instVars.Value + "";
	this.colorRgb = getColorValue(this.instVars.Value);
	this.text.colorRgb = getColorValue(this.instVars.Value);
	}
	
	
	
}