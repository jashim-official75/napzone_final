export default class Vector{

	constructor(x,y)
	{
		this.x = x;
		this.y = y;
	}
	
	
	mag()
	{
		return Math.sqrt(this.x*this.x + this.y*this.y);
	}


	sub(item)
	{
		return new Vector(this.x - item.x,this.y-item.y);
	}
	
	add(item)
	{
		return new Vector(this.x + item.x,this.y+item.y);
	}

	mul(item)
	{
		return new Vector(this.x*item,this.y*item);
	}
	
	normalized()
	{
		return  this.mul(1/this.mag());
	}
	clone()
	{
		return new Vector(this.x,this.y);
	}

}