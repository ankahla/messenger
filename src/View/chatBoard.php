<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Chat board</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="web/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<h2>Chat board</h2>
			<div>Bonjour <?php echo $user->getFirstName().' '.$user->getLastName() ?>
				(<?php echo $user->getEmail() ?>) <a href="logout">Se deconnecter</a>
			</div>
		<div class="row">
			<div class="col-md-2">
				<h4>Utilisateurs connectés</h4>
				<ul>
					<?php foreach ($connectedUsers as $session): ?>
						<li><a href="chat_board?receiver_id=<?php echo $session->getUserId() ?>"><?php echo $session->getUserName() ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="col-md-10">
				<h4>Conversation</h4>
					<?php foreach ($lastMessages as $message): ?>
						<div class="row"><pre class="col-md-6 <?php echo $message->getReceiverId() == $receiverId ? 'pull-right bg-success' : 'pull-left bg-info' ?>"><?php echo $message->getContent() ?></pre>
							</div>
					<?php endforeach; ?>
				<div class="form-group mt-3 mb-0">
					<?php if ($receiverId): ?>
					<form action="chat_board/post_message" method="post">
						<input type="hidden" name="receiver_id" value="<?php echo $receiverId ?>" />
						<textarea name="content" class="form-control" rows="3" placeholder="Ecrire votre message ..."></textarea>
						<button type="submit" class="btn btn-primary">Envoyer</button>

					</form>
				<?php endif ?>
				</div>
			</div>
		</div>

	</div>    
</body>
</html>