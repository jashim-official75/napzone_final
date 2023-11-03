
export function lerp(x,y,val)
{
	const v = val>1?1:val<0?0:val;
	return x + (y-x)*v;
}



export function lerpArray(x,y,val)
{
	if(x.length!== y.length)
	return;
	
	const list = [];
	
	for(let i=0;i<x.length;i++)
	{
		list.push(lerp(x[i],y[i],val));	
	}
	return list;
}

export function max(x,y)
{
	return x > y ? x:y;
}


export function min(x,y)
{
	return x < y ? x:y;
}

export function rand(start,end)
{
	return Math.floor(Math.random()*(end-start)) + start;
}


export function abs(val)
{
	return val < 0 ? -val : val;
}