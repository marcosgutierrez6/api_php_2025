import fetch from 'node-fetch';

let API = 'https://localhost:8000';
export async function getData(){
    const res = await fetch(API);
    const data = await res.json();
    try{
        console.log(data);
        return data;
    }catch(e){
        console.log('SOME ERROR');
        console.log(e);
        process.exit(0);
    }
}
getData().then(result=>{
    console.log(data);
}).catch(error=>{
    console.log('no va');
});