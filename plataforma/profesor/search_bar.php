<div class="logo">
					<img src="data:image/jpg;base64,<?php echo base64_encode($fila['escudo']); ?>">
				</div>
				<div class="busqueda">
					<input type="text" onkeyup="querysearchbar()" id="querysearchbar">
					<input type="submit" value="🔎">
					<div class="querysearchbar" id="querysearchbardiv"></div>
				</div>
<style type="text/css">
	.querysearchbar{
		width: 30%;
		position: fixed;
		background-color: #ffffff;
		top: 42px;
		left: 53px;
		/*border: 1px solid #000000;*/
	}
	.querysearchbar button{
		color: #000000;
		width: 100%;
		height: 50px;
		padding: 10px;
		box-sizing: border-box;
		border: 1px solid #dddddd;
	}
	.consultan{
		color: #0B3169;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>