<section class="content-header">
	<h1>
		Interview
		<small>Phone script</small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
	  <li><?php echo anchor($breadcrumb,'List')?></li>
	  <li class="active">Interview</li>
	</ol>
</section>
<section class="content">
<?php echo $this->session->flashdata('alert')?>
	<div class="row">
		<?php echo form_open($action) ?>
		<div class="col-md-8 col-sm-8">
			<div class="box box-status">
				<div class="box-body form-inline">
					Status : 
					<?php echo form_dropdown('status',$this->interview_model->status_dropdown(),set_value('status',$candidate->status),'class="form-control"') ?>
					<div class="pull-right">
						<div class="checkbox <?php echo ($this->user_login['level']==2?'hide':'') ?>">
							<label>
								<?php echo form_checkbox(array('id'=>'valid','name'=>'valid','value'=>'1','checked'=>set_value('valid',($candidate->valid==1?true:false)))) ?>
								Valid
							</label>
						</div>
						<div class="checkbox <?php echo ($this->user_login['level']==3?'hide':'') ?>">
							<label>
								<?php echo form_checkbox(array('id'=>'audit','name'=>'audit','value'=>'1','checked'=>set_value('audit',($candidate->audit==1?true:false)))) ?>
								Audit
							</label>
						</div>
					</div>
					<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
				</div>	
			</div>	
			<div class="box box-opening">
				<div class="box-header info">
					<b>Opening</b>
				</div>	
				<div class="box-body">
					<h3><?php echo $greeting; ?>. Bisa berbicara dengan <strong><?php echo $candidate->name; ?></strong></h3>
					<table class="table table-bordered">
						<tr>
							<td>
								<label>Perusahaan</label>
								<p><?php echo $candidate->co; ?></p>
							</td>
							<td>
								<label>Title</label>
								<p><?php echo $candidate->title; ?></p>
							</td>
							<td>
								<label>Telephone</label>
								<p><?php echo $candidate->tel; ?></p>
							</td>
							<td>
								<label>Mobile</label>
								<p><?php echo $candidate->mobile; ?></p>
							</td>
						</tr>
					</table>
					<div class="checkbox">
						<label>
							<?php echo form_checkbox(array('id'=>'resign','name'=>'resign','value'=>'1','checked'=>set_value('resign',($candidate->resign==1?true:false)))) ?>
							Pengganti/Data Baru
						</label>
					</div>
					<table class="table table-bordered hide pengganti">
						<tr>
							<td>Nama</td>
							<td><input id="name_new" type="text" name="name_new" class="form-control" maxlength="100" autocomplete="off" value="<?php echo set_value('name_new',(isset($candidate->name_new)?$candidate->name_new:'')) ?>"></td>
						</tr>	
						<tr>
							<td>Jabatan</td>
							<td><input type="text" name="title_new" class="form-control" maxlength="100" autocomplete="off" value="<?php echo set_value('title_new',(isset($candidate->title_new)?$candidate->title_new:'')) ?>"></td>
						</tr>	
						<tr>
							<td>Telephone</td>
							<td><input type="text" name="tel_new" class="form-control" maxlength="100" autocomplete="off" value="<?php echo set_value('tel_new',(isset($candidate->tel_new)?$candidate->tel_new:'')) ?>"></td>
						</tr>	
					</table>
				</div>	
				<div class="box-footer">
					<p class="info">Jika <b>"tidak ada ditempat"</b> : Minta waktu yang tepat untuk dihubungi kembali</p>
					<p class="info">Jika <b>"Sudah resign/pindah"</b> : Minta orang yang menggatikannya</p>
					<div class="checkbox">
						<label>
							<?php echo form_checkbox(array('id'=>'called','name'=>'called','value'=>'1','checked'=>set_value('called',($candidate->called==1?true:false)))) ?>
							Berhasil Dihubungi
						</label>
					</div>
				</div>					
			</div>
			<div class="box box-minute hide">
				<div class="box-body form-inline">
					<h3><?php echo $greeting; ?>, <strong><?php echo $candidate->name; ?></strong>. Nama saya <strong><?php echo $this->user_login['name'] ?></strong> dan saya mewakili UBM SES, penyelenggara BroadcastAsia di Singapura. Apakah Anda punya waktu beberapa menit?</h3>
					<label>Jawaban :</label>
					<?php echo form_dropdown('minute',array(''=>'','1'=>'Ya','2'=>'Tidak'),set_value('minute',$candidate->minute),'id="minute" class="form-control"') ?>
				</div>
				<div class="box-footer">
					<p class="info">Jika <b>"tidak ada waktu"</b> atau <b>"sibuk"</b> : Pastikan apakah candidate mengetahui Broadcast Asia yang akan diadakan di Bulan Mei 2017 (Jika prospek memberikan indikasi untuk melanjutkan dengan panggilan, Lanjutkan kebagian selanjutnya)</p>
					<p class="info">Jika Benar-benar <b>"tidak ada waktu"</b> atau <b>"sibuk"</b> : Minta waktu yang tepat untuk dihubungi kembali</p>
				</div>
			</div>
			<div class="box box-know hide">
				<div class="box-body form-inline">
					<h3>Bisakah saya mengetahui apakah anda mengetahui Event <strong>BroadcastAsia 2017</strong> yang akan diadakan tanggal <strong>23 sd 25 Mei</strong> di <strong>Suntec Singapore</strong> ?</h3>
					<label>Jawaban :</label>
					<?php echo form_dropdown('know',array(''=>'','1'=>'Ya','2'=>'Tidak'),set_value('know',$candidate->know),'id="know" class="form-control"') ?>
				</div>
			</div>
			<div class="box box-register hide">
				<div class="box-body form-inline">
					<h3>Bagus! Apakah Anda sudah pre-registered (mendaftar) kunjungan Anda ke acara tersebut?</h3>
					<label>Jawaban :</label>
					<?php echo form_dropdown('register',array(''=>'','1'=>'Ya','2'=>'Tidak'),set_value('register',$candidate->register),'id="register" class="form-control"') ?>
				</div>
			</div>
			<div class="box box-closing hide">
				<div class="box-body form-inline">
					<h3>Terima kasih atas support & waktunya. Harap ingat untuk membawa email konfirmasi Anda untuk koleksi badge/lencana. Jika Anda ingin kami mengirimkan reminder/pengingat mendekati event, Anda dapat memberikan saya nomor ponsel/hp Anda dan kami akan mengirimkan SMS pengingat.</h3>
					<label>Nomor Ponsel :</label>
					<input type="text" name="mobile_new" class="form-control" maxlength="50" size="30" autocomplete="off" value="<?php echo set_value('mobile_new',(isset($candidate->mobile_new)?$candidate->mobile_new:'')) ?>">
             		<h3>Sampai jumpa di acara tersebut! </h3>
				</div>
				<div class="box-footer">
					<p class="info">Nomor Ponsel Sebelumnya : <b><?php echo $candidate->mobile; ?></b></p>
				</div>
			</div>
			<div class="box box-unknow hide">
				<div class="box-header info">Berikan info tentang BroadcastAsia2017</div>
				<div class="box-body form-inline">
					<h3>BroadcastAsia2017 adalah pameran benar-benar nyata internasional di Asia yang diakui sebagai jaringan, pengetahuan dan platform sourcing untuk industri pro-audio, film dan TV. </h3>
					<h3>Profesional dari seluruh Negara/wilayah akan berkumpul untuk jaringan, ide bisnis pertukaran, mengumpulkan informasi pasar dan sumber untuk produk terbaru dan solusi. Berharap untuk bertemu terkemuka peserta pameran internasional.</h3>
				</div>
			</div>
			<div class="box box-invite hide">
				<div class="box-body form-inline">
					<h3>Dapatkah saya email kepada Anda undangan untuk menghadiri BroadcastAsia2017 dengan informasi acara dan link ke pra-mendaftar secara online?</h3>
					<label>Jawaban :</label>
					<?php echo form_dropdown('invite',array(''=>'','1'=>'Ya','2'=>'Tidak'),set_value('invite',$candidate->invite),'id="invite" class="form-control"') ?>
				</div>
			</div>
			<div class="box box-email hide">
				<div class="box-header info">Dapatkan alamat email</div>
				<div class="box-body form-inline">
					<label>Alamat email :</label>
					<input id="email_new" type="text" name="email_new" class="form-control" maxlength="100" size="30" autocomplete="off" value="<?php echo set_value('email_new',(isset($candidate->email_new)?$candidate->email_new:'')) ?>">
					<span class='btn-send-email'><?php echo anchor('interview/send_email/'.$candidate->id,'<span class="glyphicon glyphicon-send"></span> Send Email',array('id'=>'btn-send-email'));?></span>
					<div class="send-email-alert"></div>
				</div>
				<div class="box-footer">
					<p class="info">Email Sebelumnya : <b><?php echo $candidate->email; ?></b></p>
				</div>
			</div>
			<div class="box box-partner hide">
				<div class="box-header"></div>
				<div class="box-body form-inline">
					<h3>Jika Anda tertarik untuk mengunjungi acara, silakan pra-mendaftar kunjungan Anda online di www.Broadcast-Asia.com sebelum 15 Mei 2017.</h3>
					<h3>Apakah anda juga ingin membawa rekan Anda dan teman-teman di industri untuk pertunjukan?</h3>
					<label>Jawaban :</label>
					<?php echo form_dropdown('partner',array(''=>'','1'=>'Ya','2'=>'Tidak'),set_value('partner',$candidate->partner),'id="partner" class="form-control"') ?>					
					<h3>Kami yakin bahwa itu akan relevan dan bermanfaat untuk bisnis mereka juga. Rekan Anda dapat juga pra-mendaftar secara online.</h3>
					<h3>Harap menyimpan email yang saya akan kirimkan kepada Anda segera. Terima kasih lagi dan kami berharap untuk bisa bertemu Anda kembali.</h3>
				</div>
			</div>
			<div class="box box-not-interest hide">
				<div class="box-body form-inline">
					<h3>Terima kasih untuk waktu Anda & have a nice day.</h3>
				</div>
			</div>
		</div>
		<?php echo form_close() ?>
		<div class="col-md-4 col-sm-4">
			<div class="box">
				<div class="box-header">
					<b>Interviewer</b>
				</div>	
				<div class="box-header">
					<td><?php echo $candidate->interviewer ?></td>
				</div>	
			</div>			
			<div class="box callhis-wrap">
				<div class="box-header">
					<b>Call History</b>
				</div>	
				<div class="box-body box-callhis">
					<table class="table table-responsive">
						<tr>
							<th>No</th>
							<th>Date</th>
							<th>Remark</th>
							<th>Action</th>
						</tr>	
						<?php $i=1; ?>
						<?php foreach ($callhis as $row): ?>
						<tr>
							<td><?php echo $i++ ?></td>
							<td><?php echo $row->date ?></td>
							<td data-id="<?php echo $row->id ?>" class="btn-callhis-update"><?php echo $row->status ?></td>
							<td><button type="button" class="btn btn-danger btn-xs btn-callhis-delete" value="<?php echo $row->id ?>">Delete</button></td>
						</tr>							
						<?php endforeach ?>
					</table>
				</div>	
				<div class="box-footer">
					<button type="button" class="btn btn-success btn-xs btn-callhis" value="Answer">Answer</button>
					<button type="button" class="btn btn-warning btn-xs btn-callhis" value="No Answer">No Answer</button>
					<button type="button" class="btn btn-default btn-xs btn-callhis" value="Busy">Busy</button>
					<button type="button" class="btn btn-danger btn-xs btn-callhis" value="Reject">Reject</button>
				</div>	
				<div class="box-footer">
					<input id="note" type="text" name="note" maxlength="100" class="form-control" placeholder="note..." autocomplete="off">
				</div>	
			</div>	
			<div class="box callhis-form hide">
				<div class="box-header">
					<b>Update Call History</b>
				</div>	
				<div class="box-body">
					<input type="hidden" name="id" id="callhis-id" value="5">
					<div class="form-group">
						<?php echo form_label('Date','date',array('class'=>'control-label'))?>
						<?php echo form_input(array('id'=>'callhis-date','name'=>'date','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('date',''),'required'=>'required'))?>
					</div>
					<div class="form-group">
						<?php echo form_label('Status','status',array('class'=>'control-label'))?>
						<?php echo form_input(array('id'=>'callhis-status','name'=>'status','class'=>'form-control input-sm','maxlength'=>'100','autocomplete'=>'off','value'=>set_value('status',''),'required'=>'required'))?>
					</div>
				</div>	
				<div class="box-footer">
					<button type="button" class="btn btn-success btn-xs btn-callhis-save-update">Save</button>
					<button type="button" class="btn btn-default btn-xs btn-callhis-cancel-update">Cancel</button>
				</div>	
			</div>
		</div>
	</div>	
</section>
<script type="text/javascript" src="<?php echo base_url('assets/js/interview.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#note').keyup(function(e){
	    if(e.keyCode == 13 && $(this).val() != ''){	        
			$.ajax({
				url:'<?php echo base_url() ?>index.php/interview/callhis/create',
				type:'post',
				data:{
					status:$(this).val(),
					candidate:'<?php echo $candidate->id ?>'
				},
				success:function(str){
					$('.box-callhis').html(str);							
				}
			});
			$(this).val('');
	    }else{
			console.log('Note is Emptry');
	    }
	});

	$('.btn-callhis').click(function(){
		$.ajax({
			url:'<?php echo base_url() ?>index.php/interview/callhis/create',
			type:'post',
			data:{
				status:$(this).attr('value'),
				candidate:'<?php echo $candidate->id ?>'
			},
			success:function(str){
				$('.box-callhis').html(str);
			}
		});
	});
	$('body').on('click','.btn-callhis-save-update',function(){
		$('.callhis-form').addClass('hide');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/interview/callhis/update',
			type:'post',
			data:{
				id:$('#callhis-id').val(),
				date:$('#callhis-date').val(),
				status:$('#callhis-status').val(),
				candidate:'<?php echo $candidate->id ?>'
			},
			success:function(str){
				$('.box-callhis').html(str);
			}
		});				
		$('.callhis-wrap').removeClass('hide');		
	});	
	$('body').on('click','.btn-callhis-cancel-update',function(){
		$('.callhis-form').addClass('hide');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/interview/callhis/get/<?php echo $candidate->id ?>',
			type:'post',
			success:function(str){
				$('.box-callhis').html(str);
			}
		});				
		$('.callhis-wrap').removeClass('hide');
	});	
	
	<?php if ($this->user_login['level']<>3): ?>
		$('body').on('click','.btn-callhis-update',function(){
			var date = $(this).parent().children().eq(1).html();
			var status = $(this).parent().children().eq(2).html();
			$('#callhis-id').val($(this).attr('data-id'));
			$('#callhis-date').val(date);
			$('#callhis-status').val(status);
			$('.callhis-form').removeClass('hide');
			$('.callhis-wrap').addClass('hide');
		});		
	<?php endif ?>

	$('body').on('click','.btn-callhis-delete',function(){
		if(confirm('You sure ?')){
			$.ajax({
				url:'<?php echo base_url() ?>index.php/interview/callhis/delete',
				type:'post',
				data:{
					id:$(this).attr('value'),
					candidate:'<?php echo $candidate->id ?>'
				},
				success:function(str){
					$('.box-callhis').html(str);
				}
			});				
		}
	});	
	/* - Send Email - */
	$('body').on('click','#btn-send-email',function(event){
		if(confirm('Are you sure')){
			$.ajax({
				url:$(this).attr('href')
				,data:{email:$('#email_new').val(),'fullname':$('#name_new').val()}
				,type:'post'
				,beforeSend: function () {
					$('.send-email-alert').html('<p>Please wait...</p>');
				}
				,success:function(str){
					$('.send-email-alert').html(str);
				}
			});	
		}
		event.preventDefault();	
	});	
});
</script>
<script type="text/javascript">
	/* - Deactive text submit on enter - */
	$(document).on('keyup keypress', 'form input[type="text"]', function(e) {
		if(e.which == 13) {
			e.preventDefault();
		}
	});	
</script>