import Tile from './Tile.js';
import Points from './Points.js';
import MainScene from './MainScene.js';
import InputController from './InputController.js';
import Vector from './Vector.js';
import {minBlockValue,maxBlockValue,colors,WORLD_HEIGHT} from './Settings.js';
import {lerpArray} from './Utils.js';


// Put any global functions etc. here

export let inputController = null;
export let rt = null;
export let scene = null;


runOnStartup(async runtime =>
{
	// Code to run on the loading screen.
	// Note layouts, objects etc. are not yet available.
	runtime.objects.Tile.setInstanceClass(Tile);
	runtime.objects.Points.setInstanceClass(Points);
	
	runtime.addEventListener("beforeprojectstart", () => onBeforeProjectStart(runtime));
});

function onBeforeProjectStart(runtime)
{
	rt = runtime;
	// Code to run just before 'On start of layout' on
	// the first layout. Loading has finished and initial
	// instances are created and available to use here.
	inputController = new InputController(runtime);
	runtime.layout.addEventListener("beforelayoutstart",
								   () => onBeforeLayoutStart(runtime));
	runtime.addEventListener("tick", () => Tick(runtime));
}


function onBeforeLayoutStart(runtime)
{
	scene = new MainScene(runtime);
}




function Tick(runtime)
{
	// Code to run every tick

	if(scene)
	{
		scene.tick(runtime);
	}
	
}

export function getColorValue(val)
{
	return valueToColor(val,minBlockValue,maxBlockValue,colors);
}


export function valueToColor(value,minVal,maxVal,colors)
{
	const normalized = (value - minVal)/(maxVal - minVal);
	
	const baseIndex = Math.floor(normalized*(colors.length-1));
	
	if(baseIndex>=colors.length-1)
	{
		return colors[colors.length-1];
	}
	
	const balance = normalized - baseIndex*(1/(colors.length-1));
	const l = balance / (1/(colors.length-1));
	
	return lerpArray(colors[baseIndex],colors[baseIndex+1],l);
	
}

export function worldHeight()
{
	return WORLD_HEIGHT;
}

export function toLayout(vec)
{
	return  new Vector(vec.x*(rt.layout.width/worldWidth()),rt.layout.height - vec.y*(rt.layout.height/worldHeight())); 
}

export function toWorld(vec)
{
	return new Vector(vec.x*(worldWidth()/rt.layout.width), (rt.layout.height - vec.y)*(worldHeight()/rt.layout.height));
}


export function worldWidth()
{
	return WORLD_HEIGHT*rt.layout.width/rt.layout.height;
}



export function toWorldWidth(width)
{
	return worldHeight()*width/rt.layout.height;
}



