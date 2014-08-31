<?php
include 'blocks/header.php';
$clan = $db->fetch($db->query('SELECT * FROM clans WHERE id=?i',$_GET['id']));
head ('Клан ' . $clan['name'],'main');
?>

<div class='fullclan'>
	<div class='clanname'>Roma Potens</div>

	<div style='width: 45%; height: 100%; float: left; background-color: white; border-right: 1px groove grey; border-top-left-radius: 5px; box-shadow: 0 1px 2px rgba(0, 0, 0, .2);'>
		<div style='width: 30%;  min-height: 950px; height: 100%; float: left; border-right: 1px groove grey;'>
			<h4 style='margin: 5px 3% 15px 3%; width: 94%; text-align: center; border-bottom: 1px groove grey; color: #484848;'>О клане<h4>
			<h5 style='margin: 0px 0% 0px 7%; width: 93%; text-align: left; color: #484848;'>Тег на сайте: [RP]<h4>
			<h5 style='margin: 0px 0% 0px 7%; width: 93%; text-align: left; color: #484848;'>Игровой тег клана: [RP]<h4>
			<h5 style='margin: 0px 0% 0px 7%; width: 93%; text-align: left; color: #484848;'>Время жизни: 384 дня<h4>
			<h5 style='margin: 0px 0% 0px 7%; width: 93%; text-align: left; color: #484848;'>Состав: 53 человека<h4>
			<h5 style='margin: 0px 0% 0px 7%; width: 93%; text-align: left; color: #484848;'>Фракция на карте: Roman legions<h4>
			<h5 style='margin: 0px 0% 0px 7%; width: 93%; text-align: left; color: #484848;'>К: 5 П: 36 С: 12<h4>
						<h5 style='margin: 0px 0% 0px 7%; width: 93%; text-align: left; color: #484848;'>W: 15 D: 1 L: 1<h4>
			<h4 style='margin: 15px 3% 0px 3%; width: 94%; text-align: center; border-bottom: 1px groove grey; border-top: 1px outset grey; color: #484848;'>Союзники<h4>
			<div class='btn-success' style='margin: 0px 3% 0px 3%; width: 94%; text-align: left; color: white; border-radius: 5px; padding: 3px; text-align: center;' onclick="location.href='http://clanwars.su'">WarHammer</div>
			<h4 style='margin: 15px 3% 0px 3%; width: 94%; text-align: center; border-bottom: 1px groove grey; border-top: 1px outset grey; color: #484848;'>Враги<h4>
			<div class='btn-danger' style='margin: 0px 3% 0px 3%; width: 94%; text-align: left; color: white; border-radius: 5px; padding: 3px; text-align: center; margin-bottom: 5px;' onclick="location.href='http://clanwars.su'">Brotherhood of Scorpions</div>
			<div class='btn-danger' style='margin: 0px 3% 0px 3%; width: 94%; text-align: left; color: white; border-radius: 5px; padding: 3px; text-align: center; margin-bottom: 5px;' onclick="location.href='http://clanwars.su'">Call of Cthulhu</div>
			<h4 style='margin: 15px 3% 0px 3%; width: 94%; text-align: center; border-bottom: 1px groove grey; border-top: 1px outset grey; color: #484848;'>Последние матчи<h4>
			<div style='clear: left;'>
				<div>
					<div class='btn-default' style='float: left; background-color: #e6e6e6; margin: 0px 0px 0px 3%; width: 70%; text-align: center; border-radius: 5px 0px 0px 5px; padding: 3px 3px 3px 12%; margin-bottom: 5px;'>
					RP vs BoS
					</div>
					<div class='btn-success' style='width: 25%; height: 100%; float: left; border-radius: 0px 5px 5px 0px; padding: 3px; text-align: center;'>11-9</div>
				</div>
				<div>
					<div class='btn-default' style='float: left; background-color: #e6e6e6; margin: 0px 0px 0px 3%; width: 70%; text-align: center; border-radius: 5px 0px 0px 5px; padding: 3px 3px 3px 12%; margin-bottom: 5px;'>
					RP vs WH
					</div>
					<div class='btn-danger' style='float: left; width: 25%; height: 100%; border-radius: 0px 5px 5px 0px; padding: 3px; text-align: center; clear: right;'>7-13</div>
				</div>
				<div>
					<div class='btn-default' style='float: left; background-color: #e6e6e6; margin: 0px 0px 0px 3%; width: 70%; text-align: center; border-radius: 5px 0px 0px 5px; padding: 3px 3px 3px 12%; margin-bottom: 5px;'>
					RP vs CoC
					</div>
					<div class='btn-info' style='float: left; width: 25%; height: 100%; border-radius: 0px 5px 5px 0px; padding: 3px; text-align: center; clear: right;'>10-10</div>
				</div>
			</div>
			<button type="button" class="btn btn-default" style='margin: 5px 3% 0px 3%; width: 94%;'>Статистика клана</button>
			<button type="button" class="btn btn-default" style='margin: 5px 3% 0px 3%; width: 94%;'>Отзывы о клане</button>
		</div>



		<div style='width: 70%; height: 100%; float: left;'>
			<h4 style='margin: 5px 1% 15px 1%; width: 98%; text-align: center; border-bottom: 1px groove grey; color: #484848; '>Состав<h4>
			<div>
				<div style='display: inline-block; float: left; width: 30%; height: 910px; border-right: 1px groove grey; text-align: center; '>
							<h4 style='margin: 5px 5% 0px 5%; width: 90%; text-align: center; border-bottom: 1px groove grey; color: #484848; '>Рейтинг<h4>
					<div class='btn btn-default' style='width: 93%; padding: 1%; border-radius: 6px; margin: 2.5%; font-size: 18px; color: #3085D6; box-shadow: 0px 1px 1px 0px;'>R 3956.2</div>
					<div class='btn btn-default' style='width: 93%; padding: 1%; border-radius: 6px; margin: 2.5%; font-size: 18px; color: #58C026; box-shadow: 0px 1px 1px 0px;'>M 737</div>
					<h4 style='margin: 0px 10% 15px 5%; width: 90%; text-align: center; border-bottom: 1px groove grey; color: #484848; '>Логотип<h4>
					<img style='width: 7vw; height: auto; min-height: 9vh;' src="css/cavatars/1.png" alt="">
					<h4 style='margin: 1vh 10% 15px 5%; width: 90%; text-align: center; border-bottom: 1px groove grey; color: #484848; '>Баннер<h4>
											<img style='width: 7vw; height: auto; min-height: 9vh;' src="css/cavatars/RP.png" alt="">
											<h4 style='margin: 1vh 10% 15px 5%; width: 90%; text-align: center; border-bottom: 1px groove grey; color: #484848; '>Связь<h4>
											<img style='width: 6vw; height: auto;' src="css/tslogo.png" alt="">

				</div>
				<div class="switch">
    <button class="js-table">Таблицей</button>
    <button class="js-grid">Сеткой</button>
</div>
				<div class='js-list'>
				<blockquote style='display: inline-block; background-color: rgba(220,220,220,0.2); width: 67%; margin: 5px 1% 1% 1%;'>Лидер клана:</blockquote>
				<div class='leaderinfo'>
				    <img class='leaderimg' src="http://cs614929.vk.me/v614929462/1c6c4/_TxlOPfrHMo.jpg" alt="" />
				</div>


				<blockquote style='display: inline-block; background-color: rgba(220,220,220,0.2); width: 67%; margin: 5px 1% 1% 1%;'>Заместитель:</blockquote>
							<div style='float: left; margin-left: 10px; text-align: center; color: #444; padding: 10px 1% 10px 10px;'>
								<img style='border-radius: 50%; max-width: 5vmin; height: auto; ' src="http://cs614929.vk.me/v614929462/1c6c4/_TxlOPfrHMo.jpg" alt="">
								<p style='font-size: 90%; margin-top: 2%;'>Seyritey</p>
							</div>
							<div style='float: left; margin-left: 10px; text-align: center; color: #444; padding: 10px 1% 10px 10px;'>
								<img style='border-radius: 50%; max-width: 5vmin; height: auto; ' src="http://cs614929.vk.me/v614929462/1c6c4/_TxlOPfrHMo.jpg" alt="">
								<p style='font-size: 90%; margin-top: 2%;'>Seyritey</p>
							</div>
							<div style='float: left; margin-left: 10px; text-align: center; color: #444; padding: 10px 1% 10px 10px;'>
								<img style='border-radius: 50%; max-width: 5vmin; height: auto; ' src="http://cs614929.vk.me/v614929462/1c6c4/_TxlOPfrHMo.jpg" alt="">
								<p style='font-size: 90%; margin-top: 2%;'>Seyritey</p>
							</div>
							<div style='float: left; margin-left: 10px; text-align: center; color: #444; padding: 10px 1% 10px 10px;'>
								<img style='border-radius: 50%; max-width: 5vmin; height: auto; ' src="http://cs614929.vk.me/v614929462/1c6c4/_TxlOPfrHMo.jpg" alt="">
								<p style='font-size: 90%; margin-top: 2%;'>Seyritey</p>
							</div>
				<blockquote style='display: inline-block; background-color: rgba(220,220,220,0.2); width: 67%; margin: 5px 1% 1% 1%;'>Командиры:</blockquote>
					<div style='float: left; margin-left: 10px; text-align: center; color: #444; padding: 10px 1% 10px 10px;'>
							<img style='border-radius: 50%; max-width: 4vmin; height: auto; ' src="http://cs614929.vk.me/v614929462/1c6c4/_TxlOPfrHMo.jpg" alt="">
							<p style='font-size: 80%; margin-top: 2%;'>Seyritey</p>
					</div>
				</div>
						

						</div>
			





		</div>


	</div>
	<div style='width: 55%; min-height: 950px; height: 100%; float: left; background-color: white; border-top-right-radius: 5px; box-shadow: 0 1px 2px rgba(0, 0, 0, .2);'>
			<h4 style='margin: 5px 1% 15px 1%; width: 98%; text-align: center; border-bottom: 1px groove grey; color: #484848;'>Публикации клана<h4>



	</div>
</div>
<?
include 'blocks/footer.php';
?>