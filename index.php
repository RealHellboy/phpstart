<?php include_once "bd.php";?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- это css для бутстрап он нужен -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

		<link rel="stylesheet" href="style.css">

    <title>Form</title>
  </head>
  <body>
		

		<!-- комменты -->
		<section>
			<div class="container">

				<!-- heading -->
				<h3 class="sectionHeading">
					Оставьте комменнтарий
				</h3>
				<!-- /heading -->
				
				<!-- row -->
				<div class="row">
					<div class="col-lg-7">

					<?php 
						$sql = 'SELECT * FROM `comments`';
						$statement = $conn -> query($sql);
						$comments = $statement -> fetchAll(PDO::FETCH_ASSOC);
						foreach($comments as $comment){						 
						?>									 
						<!-- это верстка одного коммента -->
						<div class="commentBox">

							<div class="commentBox-wrapper">
									<!-- <button class="commentBox__reply">reply</button> -->

								<div class="commentBox__img">
									<img src="https://www.flaticon.com/svg/static/icons/svg/3532/3532852.svg" alt="img">
								</div>

								<div class="commentBox__content">
									<h5 class="commentBox__content__name"><?php echo $comment['name'] ?></h5> 
									<!-- < ?= ?> -->
									<span class="commentBox__content__date"><?=$comment['date']?></span>

									<p class="commentBox__content__message">
										<?=$comment['content']?>
									</p>
								</div>
							</div>
						<?php }; ?>

					</div>
				</div>
				<!-- /row -->

			</div>
		</section>
		<!-- /комменты -->

		<!-- form -->
		<section>
			<div class="container">

				<!-- heading -->
				<h3 class="sectionHeading">
					Оставьте комменнтарий
				</h3>
				<!-- /heading -->

				<div class="row">

					<!-- форма -->
					<div class="col-lg-7">

						<form action="formhandler.php" method="post">
							<input type="text" name="name" placeholder="Ваше Имя">
							<textarea name="content" placeholder="Ваше Сообщение"></textarea>
							<button type="submit" name="submit" class="btn btn-primary btn-lg mt-3">Отправить</button>
						</form>

					</div>
					
				</div>
				
			</div>
		</section>
		<!-- /form -->




		<!-- это файлы js для бутстрапа можешь их удалить нахуй -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>