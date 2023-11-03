import {rand} from './Utils.js';


//Sprite instance class for Points
export default class Points extends ISpriteInstance{
	
	constructor()
	{
		super();
		//create text and cache it
		this.text =  this.runtime.objects.PointsTxt.createInstance(1,this.x,this.y-20);
	}
	
	init()
	{
		this.instVars.Value = rand(this.instVars.MinValue,this.instVars.MaxValue);
		this.text.text = this.instVars.Value + "";
	}

	//destroy text with points
	destroy()
	{	
		this.text.destroy();
		super.destroy();
	}
	
}