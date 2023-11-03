import Vector from './Vector.js';
import {inputController,scene} from './Main.js';



export default class InputController{

	

	constructor(runtime)
	{
		this.onMoveListener = null;
		this.runtime = runtime;
		this.dragging = false;
		this.mousePoint = new Vector(0,0);
		this.moveDelta = new Vector(0,0);
		runtime.addEventListener("pointerup",this.onTouchUp);
		runtime.addEventListener("pointermove",this.onTouchMove);
		runtime.addEventListener("pointerdown",this.onTouchDown);
		runtime.addEventListener("pointercancel",this.onTouchCancel);
	}



 onTouchDown(e)
{
	inputController.mousePoint = new Vector(e.clientX,e.clientY);
	inputController.dragging = true;
}

 onTouchUp(e)
{
	inputController.dragging = false;
	inputController.moveDelta = new Vector(0,0);
	
}

 onTouchCancel(e)
{
	inputController.dragging = false;
	inputController.moveDelta = new Vector(0,0);
	
}
onTouchMove(e)
{
	if(!inputController.dragging)
	return;
	const currentPoint = new Vector(e.clientX,e.clientY);
	inputController.moveDelta = currentPoint.sub(inputController.mousePoint);
	inputController.mousePoint = currentPoint;

	if(inputController.onMoveListener)
	{
		inputController.onMoveListener.bind(scene.player);
		inputController.onMoveListener(inputController.moveDelta);
	}
}



}