<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script>
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}
	
var testvalue = "Hola mundo!";
document.cookie = "testcookie=" + encodeURIComponent( testvalue );

var array = '["apple","orange","banana","strawberry"]';

debugger


document.cookie = "array1="+array;
document.cookie = "esasss=" + encodeURIComponent( testvalue );

debugger




var leer1 =getCookie("array1");
console.log("primero");
console.log(JSON.parse(leer1));
leer1 = JSON.parse(leer1);


leer1[leer1.length]= "caacaa";


debugger
document.cookie = "array1="+JSON.stringify(leer1);

debugger









var leer =getCookie("array1");
debugger
console.log(JSON.parse(leer));

debugger
</script>