//Change you settings Here

export let WORLD_HEIGHT =10;
export let colors = [
[1,1,0],[184/255,63/255,129/255],[83/255,189/255,255/255],[126/255,235/255,193/255],[.5,.5,1]
]; //Obstacle Colors - Color will be pick based on value and max and min block value

export let minBlockValue = 0; //min value block can go
export let maxBlockValue = 50; //max value block can go


export let speed  = 3; //start speed
export let maxSpeed = 4; //max speed
export let speedIncreaseRate = 0.03; //speed increate rate

export const startUpPartCount = 5; // initial part count
export const maxVisiblePartCount = 200; // max visible part count to better performace
export const snakeDamageRate = 15; // per second
