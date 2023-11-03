//path for snake
export default class Path
{

	constructor()
	{
 		this.points = [];
	}


insert(index,item)
{
	this.points.splice( index, 0, item );
}


removeAt(i)
{
	this.points.splice(i,1);
}

	add(item)
	{
		this.points.push(item)
	}


	getPointAndBaseIndexForLength(length)
	{
// 	console.log("get Point");
		

		
		let currentLength = 0;
		
		
		
		
		for(let i = 0 ; i < this.points.length-1;i++)
		{
			const distance = this.points[i+1].sub(this.points[i]).mag();
			
			if(currentLength+distance >= length)
			{
				return {
					baseIndex:i,
					point: this.points[i].add(this.points[i+1].sub(this.points[i]).mul((length - currentLength)/distance))
				}
			}
			currentLength += distance;
		}
		
	}

count(){
return this.points.length;
}
	get(i)
	{
		return this.points[i];
	}

findSegmentPoints(segmentLength,maxCount=-1,offset=0,maxPathLengthOfSegment=100)
{

	const data = this.getPointAndBaseIndexForLength(offset);
	if(!data || !this.points.length)
	{
	console.log(data);
	
		return null;
	}
	
	
	const list = [data.point]
	
	let lastSelectedPoint = list[list.length-1];
	let basePathLength = offset - lastSelectedPoint.sub(this.points[data.baseIndex]).mag();
	let lastPathLength = offset;
	
	for(let i = data.baseIndex+1;i<this.points.length;i++)
	{
		const thisPathLength = this.points[i].sub(this.points[i-1]).mag();
		let currentInt = 0;
		
		do{
			currentInt++;
			const diff = this.points[i].sub(lastSelectedPoint);
			
			if(diff.mag()> segmentLength)
			{
			
				const direction = this.points[i].sub(this.points[i-1]).normalized();
				const relPos = this.points[i-1].sub(lastSelectedPoint);
				
				const a = (direction.x * direction.x + direction.y * direction.y);
                const b = 2 * (relPos.x * direction.x + relPos.y * direction.y);
                const c = relPos.x * relPos.x + relPos.y * relPos.y - segmentLength * segmentLength;
				const rootB2Minus4ac = Math.sqrt(b * b - 4 * a * c);
				
				 
				
				
				 const result1 = (-b + rootB2Minus4ac) / (2 * a);
                 const result2 = (-b - rootB2Minus4ac) / (2 * a);
				 const dis = result1 > result2 ? result1 : result2;
				 
				 const targetPoint = relPos.add(direction.mul(dis)).add(lastSelectedPoint);
// 				 console.log((basePathLength + targetPoint.sub(this.points[i - 1]).mag() - lastPathLength));
				if ((basePathLength + targetPoint.sub(this.points[i - 1]).mag() - lastPathLength) <=
					maxPathLengthOfSegment)
				{
					list.push(targetPoint);
					lastSelectedPoint = targetPoint;
					lastPathLength = basePathLength + targetPoint.sub(this.points[i - 1]).mag();
					if (list.length == maxCount)
					{
						break;
					}
				}
			}
			
			
			if ((basePathLength + thisPathLength - lastPathLength) >= maxPathLengthOfSegment)
			{
				var targetPoint = this.points[i - 1].add(this.points[i].sub(this.points[i - 1]).normalized().mul(
					(maxPathLengthOfSegment - (basePathLength - lastPathLength))));
				
				list.push(targetPoint);
				lastSelectedPoint = targetPoint;
				lastPathLength += maxPathLengthOfSegment;

				if (list.length == maxCount)
				{
					break;
				}
			}

		
		}while (this.points[i].sub(lastSelectedPoint).mag() >= segmentLength &&
                         currentInt < 100);
						 
				
				
				if(list.length >= maxCount)
				{
					break;
				}
				
				basePathLength +=thisPathLength;
	}
	
// 	if(list.length==1)
// 	list.pop();
	
	return list;

}



}

