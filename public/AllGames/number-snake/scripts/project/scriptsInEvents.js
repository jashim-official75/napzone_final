import {scene} from './Main.js';

export function getScene()
{
	return scene;
}


const scriptsInEvents = {

	async Mainevent_Event9_Act1(runtime, localVars)
	{
		getScene().startPlay();
	},

	async Mainevent_Event15_Act1(runtime, localVars)
	{
		for(const ist of runtime.objects.score_txt.instances())
		{
			ist.text = getScene().score+"";
		}
	}

};

self.C3.ScriptsInEvents = scriptsInEvents;

