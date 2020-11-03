var quotes= ["'It's not the size of the dog in the fight, but the size of the fight in the dog.' -Archie Griffen", 
"'Nothing lasts forever. Not even your trouble.' -Arnold H Glasgow",
"'There are only two ways to live your life. One is as though nothing is a miracle. The other is as though everything is a miracle.' -Albert Einstein",
"'Being strong means rejoicing in who you are, complete with imperfections.-Margaret Woodhouse",
"The only place you find success before work is in the dictionary.' -May V Smith",
"'Nobody can make you feel inferior without your consent.' -Eleanor Roosevelt",
"'It took me a long time not to judge myself through someone else's eyes.' -Sally Field",
"'Hope never abandons you, you abandon it.' -George Weinberg"];


	var randomNumber = Math.floor(Math.random() * (quotes.length));
	document.getElementById("quotee").innerHTML = quotes[randomNumber];

function pink() {
 document.getElementById("quoteDisplay").style.backgroundColor= "#ffcccc";
 document.getElementById("quoteDisplay").style.border= "5px solid #ff4d4d";
 document.getElementById("quotee").style.fontFamily= "'Palatino Linotype', 'Book Antiqua', Palatino, serif";
}	
function blue() {
 document.getElementById("quoteDisplay").style.backgroundColor= "#ccd9ff";
 document.getElementById("quoteDisplay").style.border= "5px solid #1a53ff";
 document.getElementById("quotee").style.fontFamily= "'Courier New', Courier, monospace";
}
function green() {
 document.getElementById("quoteDisplay").style.backgroundColor= "#99e699";
 document.getElementById("quoteDisplay").style.border= "5px solid #248f24";
 document.getElementById("quotee").style.fontFamily = "Impact,Charcoal,sans-serif";
}
function purple() {
 document.getElementById("quoteDisplay").style.backgroundColor= "#e6b3cc";
 document.getElementById("quoteDisplay").style.border= "5px solid #ac3973";
 document.getElementById("quotee").style.fontFamily = "times new roman";
 document.getElementById("quotee").style.fontSize = "20px";
}

function converter(valNum) {

       if (inputType.value=="kilogram"){
       	var inp=valNum*2.2046;
       	var tr= inp.toFixed(4);
       	document.getElementById("output").innerHTML= tr +" lb";}
        else
       { var inp= valNum/2.2046;
       	 var tt=inp.toFixed(4);
        document.getElementById("output").innerHTML= tt +" kg";}
	       }

function calc(str){
	var arr=str.split(",");
	var n= [];
	var max=parseInt(arr[0]);
	var min= parseInt(arr[0]);
	var sum= 0;
	var avg=0;
	for (var i=0; i<arr.length ; i++) {
	 n[i]=parseInt(arr[i]);
	 sum +=n[i];
	 avg = sum/(i+1)
	 if (max<n[i]){max=n[i]}
	
    if (min>n[i]){ min=n[i]}
}
    document.getElementById("max").innerHTML=max;
    document.getElementById("min").innerHTML=min;
    document.getElementById("sum").innerHTML=sum;
    document.getElementById("avg").innerHTML=avg;
    document.getElementById("rev").innerHTML= arr.reverse();
}	       

document.getElementById("clear").addEventListener("click", clearit);
document.getElementById("caps").addEventListener("click", caps);
document.getElementById("sort").addEventListener("click", sort);
document.getElementById("reverse").addEventListener("click", reverse);
document.getElementById("strip").addEventListener("click", strip);
document.getElementById("addnum").addEventListener("click", addnum);
document.getElementById("shuffle").addEventListener("click", shuffle);

function clearit() {
	text.value= "";
}

function caps() {
	text.value= text.value.toUpperCase();
}

function sort() {
	var ar = text.value.split('\n');
	ar.sort();
	text.value= ar.join('\n');
}

function reverse() {
	var x = text.value.split('\n');
	x.reverse();
	text.value= x.join('\n');
}

function strip() {
	var y=text.value.split('\n');

    for (var i = 0; i < y.length; i++) {
    	y[i] = y[i].trim();
    }
    text.value=y.join('\n');
    text.value= text.value.replace( /[\r\n]+/gm, '\n');
}

function addnum() {
	var z=text.value.split('\n');

	for (var i = 0; i < z.length; i++) {
		z[i]= i+"." + " " + z[i];
	}
	text.value=z.join('\n');
}

function shuffle() {
     var a=text.value.split('\n');
    
    for (var i = a.length-1; i > 0; i--) { 
      var j=Math.floor(Math.random()* (i+1));
      var temp=a[i];
      a[i]=a[j];
      a[j]=temp;
          
          }
    text.value=a.join('\n');
}