function despliega(){
    
    var option = document.getElementById('dire');
    
    if(option.checked === true){
    console.log("Funciona");
    document.getElementById('direccion').style.display = 'block';
    }
    else{
        oculta();
    }
}

function oculta() {
     document.getElementById('direccion').style.display = 'none'; 
}
