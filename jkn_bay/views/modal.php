<!-- The modal -->
	<div id='modalDialog' class='modal' style="width:40%; margin-top: 5%; margin-left:30%;">
		<div class='modal-content animate-top'>
			<div class='modal-header' style="background-color: lightgrey;">
				<h5 class="modal-title">Reply</h5>
				<button type="button" class='btn' id="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
			</div>
			<form method="post" id="replyFrm">
				<div class="modal-body">
					<div class="response"></div>

						<div class="form-group">
							<label for="message">Enter Message</label>
							<input type="text" class="form-control" id="message" name="message">
						</div>
				</div>

				<div class="modal-footer">
					<button type="submit" name='action' id="submit" class="btn btn-success">Send</button>
				</div>	
			</form>
		</div>
	</div>