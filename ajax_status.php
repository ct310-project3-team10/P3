<!DOCTYPE html>
<html lang="en">

<body>

<script>
var json;
var xhr = new XMLHttpRequest();
xhr.open('GET', 'https://www.cs.colostate.edu/~bovairds/');

console.log(xhr.responseText);
xhr.onload = function() {
	 if (xhr.status === 200) {
			json = JSON.stringify({"status": "open"});
			
	 }else{
			json = {"status": "closed"};
	 }
};
xhr.send(json)

</script>



</body>
</html>