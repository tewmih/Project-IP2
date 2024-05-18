const eye=document.querySelector(".pass img");
const line=document.querySelector(".pass .line");
const checkbox=document.querySelector(".checkboxofpassword");

line.style.display='';
checkbox.addEventListener("mousedown",function(){
    
    const txt=document.querySelector(".pass input[name='password']");
    line.style.display=line.style.display==='none'?'':'none';
    txt.type=line.style.display==='none'?'text':'password';
});
eye.addEventListener("mouseup",function(){
    
    const txt=document.querySelector(".pass input[name='password']");
    line.style.display='';
    txt.type='password';
});
function fun(Text,Color,Value){
    const strength = document.querySelector(".strength");
    const range = document.querySelector(".range");
    strength.innerText = Text;
    strength.style.color=Color;
    range.value = Value;
    range.style.setProperty("--thumb-color", Color);
}
function changehandler() {
    const length = document.getElementsByName("password")[0];
    if (length.value.length === 0) {
        fun("","black",0);
    } else if (length.value.length < 8) {
        fun("Low","red",5);
    } else if (length.value.length < 11) {
        fun("Medium","orange",30);
    } else if (length.value.length < 13) {
        fun("Strong","rgb(210,210,100)",50)
    } else if(length.value.length<16) {
        fun("Very Strong","green",70);
    }else{
        fun("Extremly Strong","darkGreen",100);
    }
}



