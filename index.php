<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="HDStudio Piotr Mikulski">
	<meta name="author" content="Piotr Mikulski">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<style>
		body{
			margin: 0;
			padding: 0;
		}
		.fullScreenSlider{
			width: 100%;
			height: 100%;
			position: fixed;
			background-color: rgba(1,1,1,0.8);
			display: none;
		}
		.imgSlider{
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			height: 100%;
		}
		.displaySystem{
			display: inline-block;
		}
		.icons{
			transition: all 0.3s;
			width: 30px;
			opacity: 0.3;
		}
		.icons:hover{
			transition: all 0.3s;
			cursor: pointer;
			opacity: 1;
		}
		.iconsX{
			margin-left: 50px;
			width: 35px;
		}
		.counterText{
			color: white;
			font-family: "Times New Roman", Times, serif;
		}
		.positionEnd{
			text-align: end;
		}
		.marginBottom{
			margin-bottom: 7px;
		}
		.sliderImage{
			max-height: 80vh;
		}
		.thumbnail{
			width: 150px;
			height: 100px;
		}
	</style>
</head>
<body id="body">

	<div id="containerSlider" class="fullScreenSlider">
		<div class="imgSlider">
			<div class="positionEnd">
				<div id="imgSlider" class="marginBottom">
					<img class="img-fluid" src="./sliderImg/37.jpeg" alt=""/>
				</div>
			</div>
			<div style="position: fixed; bottom: 10px; left: 46%">
				<div class="displaySystem" onclick="arrayLeft();">
					<img class="img-fluid icons" src="./assets/icons/icons8-wide-left-arrow-64.png" alt="<-"/>
				</div>
				<div id="currentAndTotal" class="displaySystem counterText">

				</div>
				<div class="displaySystem" onclick="arrayRight();">
					<img class="img-fluid icons" src="./assets/icons/icons8-wide-right-arrow-64.png" alt="->"/>
				</div>
				<div class="displaySystem" onclick="hideSlider();">
					<img class="img-fluid icons iconsX" src="./assets/icons/icons8-cancel-48.png" alt="X"/>
				</div>
			</div>
		</div>
	</div>

	<img class="img-fluid thumbnail sliderImage" style="overflo" src="./sliderImg/290.jpeg" alt=""/>
	<img class="img-fluid thumbnail sliderImage" src="./sliderImg/292.jpeg" alt=""/>
	<img class="img-fluid thumbnail sliderImage" src="./sliderImg/37.jpeg" alt=""/>
	<img class="img-fluid thumbnail sliderImage" src="./sliderImg/36.jpeg" alt=""/>
	<img class="img-fluid thumbnail sliderImage" src="./sliderImg/274.jpeg" alt=""/>
	<img class="img-fluid thumbnail sliderImage" src="./sliderImg/folio-img-3.jpg" alt=""/>

	<script>
		//------ CONFIG START ------
		const imagesClassName = ".sliderImage"; // Here you have to set class name all img elements including to slider. Don't forget to set the same class in img elements
		//------ CONFIG END --------

		var currentImg = null;
		var x = document.querySelectorAll(imagesClassName);
		var totalElements = x.length;
		var i;
		var srcArray = [];
		for (i = 0; i < x.length; i++) {
			srcArray.push(x[i].getAttribute('src'));
			x[i].onclick = function() {return showSlider(this);}
		}

		x = null;

		function showSlider(element){
			var img = document.createElement('img');
            img.src = element.getAttribute('src');
			currentImg = srcArray.indexOf(element.getAttribute('src'));
			img.className = "img-fluid";
			img.className = "sliderImage";
			var sliderContainer = document.getElementById('containerSlider');
			var slider = document.getElementById('imgSlider');
            slider.replaceChild(img,slider.childNodes[1]);
			sliderContainer.style.display = 'block';
			document.getElementById('currentAndTotal').innerHTML = "[" + (currentImg+1) + "/" + totalElements + "]";
		}
		function hideSlider(){
			document.getElementById('containerSlider').style.display= 'none';
		}
		function arrayLeft(){
			var img = document.createElement('img');
			currentImg --;
			if(currentImg < 0){ currentImg = totalElements-1; }
            img.src = srcArray[currentImg];
			img.className = "img-fluid";
			img.className = "sliderImage";
			var slider = document.getElementById('imgSlider');
            slider.replaceChild(img,slider.childNodes[1]);
			document.getElementById('currentAndTotal').innerHTML = "[" + (currentImg+1) + "/" + totalElements + "]";
		}
		function arrayRight(){
			var img = document.createElement('img');
			currentImg ++;
			if(currentImg >= totalElements){ currentImg = 0; }
            img.src = srcArray[currentImg];
			img.className = "img-fluid";
			img.className = "sliderImage";
			var slider = document.getElementById('imgSlider');
            slider.replaceChild(img,slider.childNodes[1]);
			document.getElementById('currentAndTotal').innerHTML = "[" + (currentImg+1) + "/" + totalElements + "]";
		}
	</script>
</body>
</html>
