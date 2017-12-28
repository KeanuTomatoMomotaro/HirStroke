//Stuff taken from kanji.sljfaq.org

//Function getPosition, possibly for coordinates position?
function get_position(evt){
  evt=(evt)?evt:((event)?event:null);
  var left=0;
  var top=0;
  if(evt.pageX){
    left=evt.pageX;top=evt.pageY;
  }else if(typeof(document.documentElement.scrollLeft)!=undefined){
    left=evt.clientX+document.documentElement.scrollLeft;
    top=evt.clientY+document.documentElement.scrollTop;
  }else{
    left=evt.clientX+document.body.scrollLeft;
    top=evt.clientY+document.body.scrollTop;
  }
  return{
    x:left,y:top}
    ;
  }

//getting numbers
var show_numbers=getbyid("show-numbers");
this.show_numbers=show_numbers.checked;
show_numbers.onclick=function(event){self.toggle_show_numbers();}

//getting numbers pt 2?
DrawKanji.prototype.toggle_show_numbers=function()
  {var show_numbers=getbyid("show-numbers");
  this.show_numbers=show_numbers.checked;
  set_cookie(draw_cookie("show-numbers")+
  value_from_bool(this.show_numbers));
  this.canvas.clear();
  this.drawAll();
}
