function animate(func1 = null,elm,tab,duration1,iterations,func2=null,duration2=null){
    if(func1 != null)func1();
    elm.animate(tab, {
        duration: duration1,
        iterations: iterations
    });
    if(func2 != null)setTimeout(func2, duration2);
}


