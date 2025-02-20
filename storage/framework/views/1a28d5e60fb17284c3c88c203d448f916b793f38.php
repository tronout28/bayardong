
<?php $__env->startSection('title', __('spreadsheet::lang.spreadsheet')); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
	<style>
		.jstree-default a { 
			white-space:normal !important; height: auto; 
		}
		.jstree-anchor {
			height: auto !important;
		}
		.jstree-default li > ins { 
			vertical-align:top; 
		}
		.jstree-leaf {
			height: auto;
		}
		.jstree-leaf a{
			height: auto !important;
		}
		.sheet-info {
			margin-left: 38px;
			margin-top: -8px;
		}
		.tree-actions {
			display: inherit;
		}
	</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('spreadsheet::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1>
    	<?php echo app('translator')->get('spreadsheet::lang.spreadsheet'); ?>
    </h1>
</section>
<!-- Main content -->
<section class="content no-print">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo app('translator')->get('spreadsheet::lang.my_spreadsheets'); ?></h3>
					<div class="box-tools pull-right">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create.spreadsheet')): ?>
							<button type="button" class="btn btn-primary add_folder_btn btn-sm">
								<i class="fas fa-folder-plus"></i>
								<?php echo app('translator')->get('spreadsheet::lang.add_folder'); ?>
							</button>
						<?php endif; ?>
					</div>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-4 mb-12 col-md-offset-4">
							<div class="input-group">
								<input type="input" class="form-control" id="spread_sheet_tree_search">
								<span class="input-group-addon">
									<i class="fas fa-search"></i>
								</span>
							</div>
						</div>
						<div class="col-md-4">
							<button class="btn btn-primary btn-sm" id="expand_all"><?php echo app('translator')->get('accounting::lang.expand_all'); ?></button>
							<button class="btn btn-primary btn-sm" id="collapse_all"><?php echo app('translator')->get('accounting::lang.collapse_all'); ?></button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="spreadsheets_tree">
								<ul>
									<?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
									<li><?php echo e($folder->name, false); ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create.spreadsheet')): ?>
										<span class="tree-actions">
											<a class="btn btn-xs btn-default add-sheet" 
												title="<?php echo app('translator')->get('spreadsheet::lang.create_spreadsheet'); ?>"
												href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'create']), false); ?>?folder_id=<?php echo e($folder->id, false); ?>">
												<i class="fas fa-plus text-success"></i></a>

												<a class="btn btn-xs btn-default edit_folder" 
												title="<?php echo app('translator')->get('spreadsheet::lang.edit_folder'); ?>"
												href="#" data-name="<?php echo e($folder->name, false); ?>" data-id="<?php echo e($folder->id, false); ?>">
												<i class="fas fa-edit text-primary"></i></a>
										</span>
										<?php endif; ?>
										<ul>
											<?php $__currentLoopData = $spreadsheets->where('folder_id', $folder->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spreadsheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li data-jstree='{ "icon" : "fas fa-file-excel" }'>
													<?php echo e($spreadsheet->name, false); ?>

													<span class="tree-actions">
														<a class="btn btn-xs btn-default text-success view-sheet" 
															title="<?php echo app('translator')->get('messages.view'); ?>"
															href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'show'], [$spreadsheet->id]), false); ?>" target="_blank">
															<i class="fas fa-eye text-primary"></i></a>
														<?php if(auth()->user()->id == $spreadsheet->created_by): ?>
															<a 
																class="btn btn-modal btn-xs btn-default delete-sheet" title="<?php echo app('translator')->get('messages.delete'); ?>"
																data-href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'destroy'], [$spreadsheet->id]), false); ?>"
																href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'destroy'], [$spreadsheet->id]), false); ?>">
																<i class="fas fa-trash-alt text-danger"></i>
															</a>
															<a 
																data-href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'getShareSpreadsheet'], ['id' => $spreadsheet->id]), false); ?>" 
																title="<?php echo app('translator')->get('spreadsheet::lang.share'); ?>" 
																class="btn btn-default btn-xs share_excel">
																<i class="fa fa-share text-success"></i>
															</a>

															<a 
																href="#" 
																title="<?php echo app('translator')->get('spreadsheet::lang.move_to_another_folder'); ?>" 
																class="btn btn-default btn-xs move_to_another_folder"
																data-spreadsheet_id="<?php echo e($spreadsheet->id, false); ?>">
																<i class="fas fa-external-link-alt text-warning"></i>
															</a>
														<?php endif; ?>
													</span>
													<div class="sheet-info">
														<small class="text-muted"><strong><i class="fas fa-clock" title="<?php echo app('translator')->get('lang_v1.updated_at'); ?>"></i></strong> 
															<?php echo e(\Carbon::createFromTimestamp(strtotime($spreadsheet->updated_at))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

															<strong><i class="fas fa-user" title="<?php echo app('translator')->get('business.created_by'); ?>"></i></strong> <?php echo e($spreadsheet->createdBy->user_full_name, false); ?>

														</small>
													</div>
													<?php if(count($spreadsheet->shares) > 0): ?>
														<div class="sheet-info">
															<small class="text-muted"><strong><i class="fas fa-share-alt" title="<?php echo app('translator')->get('spreadsheet::lang.shared_with'); ?>"></i></strong></small>
															<?php if(!empty($spreadsheet->shered_users)): ?>
																<small class="text-muted"><strong><?php echo app('translator')->get('user.users'); ?></strong> - <?php echo e(implode(', ', $spreadsheet->shered_users), false); ?></small>
															<?php endif; ?>
															<?php if(!empty($spreadsheet->shared_roles)): ?>
																<small class="text-muted"><strong><?php echo app('translator')->get('user.roles'); ?></strong> - <?php echo e(implode(', ', $spreadsheet->shared_roles), false); ?></small>
															<?php endif; ?>
															<?php if(!empty($spreadsheet->shared_todos)): ?>
																<small class="text-muted"><strong><?php echo app('translator')->get('spreadsheet::lang.todos'); ?></strong> - <?php echo e(implode(', ', $spreadsheet->shared_todos), false); ?></small>
															<?php endif; ?>
														</div>
													<?php endif; ?>
												</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									</li>									
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<li><?php echo app('translator')->get('spreadsheet::lang.untitled'); ?>
										<span class="tree-actions">
											<a class="btn btn-xs btn-default add-sheet" 
												title="<?php echo app('translator')->get('spreadsheet::lang.create_spreadsheet'); ?>"
												href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'create']), false); ?>">
												<i class="fas fa-plus text-success"></i></a>
										</span>
										<ul>
											<?php $__currentLoopData = $spreadsheets->where('folder_id', null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spreadsheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li data-jstree='{ "icon" : "fas fa-file-excel" }'>
													<?php echo e($spreadsheet->name, false); ?>

													<span class="tree-actions">
														<a class="btn btn-xs btn-default text-success view-sheet" 
															title="<?php echo app('translator')->get('messages.view'); ?>"
															href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'show'], [$spreadsheet->id]), false); ?>" target="_blank">
															<i class="fas fa-eye text-primary"></i></a>
														<?php if(auth()->user()->id == $spreadsheet->created_by): ?>
															<a 
																class="btn btn-modal btn-xs btn-default delete-sheet" title="<?php echo app('translator')->get('messages.delete'); ?>"
																data-href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'destroy'], [$spreadsheet->id]), false); ?>"
																href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'destroy'], [$spreadsheet->id]), false); ?>">
																<i class="fas fa-trash-alt text-danger"></i>
															</a>
															<a 
																data-href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'getShareSpreadsheet'], ['id' => $spreadsheet->id]), false); ?>" 
																title="<?php echo app('translator')->get('spreadsheet::lang.share'); ?>" 
																class="btn btn-default btn-xs share_excel">
																<i class="fa fa-share text-success"></i>
															</a>

															<a 
																href="#" 
																title="<?php echo app('translator')->get('spreadsheet::lang.move_to_another_folder'); ?>" 
																class="btn btn-default btn-xs move_to_another_folder"
																data-spreadsheet_id="<?php echo e($spreadsheet->id, false); ?>">
																<i class="fas fa-external-link-alt text-warning"></i>
															</a>
														<?php endif; ?>
													</span>
													<div class="sheet-info">
														<small class="text-muted"><strong><i class="fas fa-clock" title="<?php echo app('translator')->get('lang_v1.updated_at'); ?>"></i></strong> 
															<?php echo e(\Carbon::createFromTimestamp(strtotime($spreadsheet->updated_at))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

															<strong><i class="fas fa-user" title="<?php echo app('translator')->get('business.created_by'); ?>"></i></strong> <?php echo e($spreadsheet->createdBy->user_full_name, false); ?>

														</small>
													</div>
													<?php if(count($spreadsheet->shares) > 0): ?>
														<div class="sheet-info">
															<small class="text-muted"><strong><i class="fas fa-share-alt" title="<?php echo app('translator')->get('spreadsheet::lang.shared_with'); ?>"></i></strong></small>
															<?php if(!empty($spreadsheet->shered_users)): ?>
																<small class="text-muted"><strong><?php echo app('translator')->get('user.users'); ?></strong> - <?php echo e(implode(', ', $spreadsheet->shered_users), false); ?></small>
															<?php endif; ?>
															<?php if(!empty($spreadsheet->shared_roles)): ?>
																<small class="text-muted"><strong><?php echo app('translator')->get('user.roles'); ?></strong> - <?php echo e(implode(', ', $spreadsheet->shared_roles), false); ?></small>
															<?php endif; ?>
															<?php if(!empty($spreadsheet->shared_todos)): ?>
																<small class="text-muted"><strong><?php echo app('translator')->get('spreadsheet::lang.todos'); ?></strong> - <?php echo e(implode(', ', $spreadsheet->shared_todos), false); ?></small>
															<?php endif; ?>
														</div>
													<?php endif; ?>
												</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="share_excel_modal" tabindex="-1" role="dialog"></div>
	<div class="modal fade" id="add_folder_modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
  			<div class="modal-content">
    			<?php echo Form::open(['action' => '\Modules\Spreadsheet\Http\Controllers\SpreadsheetController@addFolder', 'method' => 'post' ]); ?>

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><?php echo app('translator')->get('spreadsheet::lang.add_folder'); ?></h4>
					</div>

					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" id="folder_id" name="folder_id">
							<?php echo Form::label('folder_name', __('lang_v1.name') . ':*'); ?>

							<?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'id' => 'folder_name']); ?>

						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
					</div>

				<?php echo Form::close(); ?>


			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<div class="modal fade" id="move_to_folder_modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
  			<div class="modal-content">
    			<?php echo Form::open(['action' => '\Modules\Spreadsheet\Http\Controllers\SpreadsheetController@moveToFolder',
					 'method' => 'post' ]); ?>

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><?php echo app('translator')->get('spreadsheet::lang.move_to'); ?></h4>
					</div>

					<div class="modal-body">
						<input type="hidden" id="spreadsheet_id" name="spreadsheet_id">
						<div class="form-group">
							<?php echo Form::label('move_to_folder', __('spreadsheet::lang.folder') . ':*'); ?>

							<?php echo Form::select('move_to_folder', $folders->pluck('name', 'id'), null, 
								['class' => 'form-control', 'required', 'id' => 'move_to_folder', 
								'style' => 'width: 100%;', 'placeholder' => __('messages.please_select')]); ?>

						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'spreadsheet::lang.move' ); ?></button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
					</div>

				<?php echo Form::close(); ?>


			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
		
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
	<script type="text/javascript">
		$(document).ready( function(){
			$('#move_to_folder').select2({
				dropdownParent: $('#move_to_folder_modal')
			});
		});
		$(document).on('click', '.add_folder_btn', function(){
			$('#add_folder_modal').modal('show');
		})

		$(document).on('click', '.edit_folder', function(){
			$('#folder_id').val($(this).attr('data-id'));
			$('#folder_name').val($(this).attr('data-name'));
			$('#add_folder_modal').modal('show');
		})

		$(document).on('click', '.move_to_another_folder', function(){
			$('#spreadsheet_id').val($(this).attr('data-spreadsheet_id'));
			$('#move_to_folder_modal').modal('show');
		})

		$(document).on('hidden.bs.modal', '#add_folder_modal', function (e) {
			$('#folder_id').val('');
			$('#folder_name').val('');
		});
		$(function () {
			$.jstree.defaults.core.themes.variant = "large";
			$('#spreadsheets_tree').jstree({
				"core" : {
					"themes" : {
						"responsive": true
					}
				},
				"types" : {
					"default" : {
						"icon" : "fa fa-folder"
					},
					"file" : {
						"icon" : "fa fa-file"
					},
				},
				"plugins": ["types", "search"]
			});
			$('#spreadsheets_tree').jstree("open_all");

			var to = false;
			$('#spread_sheet_tree_search').keyup(function () {
				if(to) { clearTimeout(to); }
				to = setTimeout(function () {
				var v = $('#spread_sheet_tree_search').val();
				$('#spreadsheets_tree').jstree(true).search(v);
				}, 250);
			});

			$(document).on('click', '#expand_all', function(e){
				$('#spreadsheets_tree').jstree("open_all");
			})
			$(document).on('click', '#collapse_all', function(e){
				$('#spreadsheets_tree').jstree("close_all");
			})

			$(document).on('click', '.delete-sheet', function (e) {
				e.preventDefault();
			    var url = $(this).data('href');
			    swal({
			      title: LANG.sure,
			      icon: "warning",
			      buttons: true,
			      dangerMode: true,
			    }).then((confirmed) => {
			        if (confirmed) {
			            $.ajax({
			                method:'DELETE',
			                dataType: 'json',
			                url: url,
			                success: function(result){
			                    if (result.success) {
			                        toastr.success(result.msg);
			                        location.reload();
			                    } else {
			                        toastr.error(result.msg);
			                    }
			                }
			            });
			        }
			    });
			});

			$(document).on('click', '.share_excel', function () {
				var url = $(this).data('href');
				$.ajax({
	                method:'GET',
	                dataType: 'html',
	                url: url,
	                success: function(result){
	                    $("#share_excel_modal").html(result).modal("show");
	                }
	            });
			});

			$(document).on('click', 'a.view-sheet', function(e) {
				window.open($(this).attr('href'));
			});

			$(document).on('click', 'a.add-sheet', function(e) {
				window.location.href = $(this).attr('href');
			});

			$('#share_excel_modal').on('shown.bs.modal', function (e) {
			    $(".select2").select2();
			    //form validation
			    $("form#share_spreadsheet").validate();
			});

			$(document).on('submit', 'form#share_spreadsheet', function(e){
			    e.preventDefault();
			    var url = $('form#share_spreadsheet').attr('action');
			    var method = $('form#share_spreadsheet').attr('method');
			    var data = $('form#share_spreadsheet').serialize();
			    var ladda = Ladda.create(document.querySelector('.ladda-button'));
			    ladda.start();
			    $.ajax({
			        method: method,
			        dataType: "json",
			        url: url,
			        data:data,
			        success: function(result){
			            ladda.stop();
			            if (result.success) {
			                toastr.success(result.msg);
			                $('#share_excel_modal').modal("hide");
			                location.reload();
			            } else {
			                toastr.error(result.msg);
			            }
			        }
			    });
			});
		})
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Spreadsheet/Providers/../Resources/views/sheet/index.blade.php ENDPATH**/ ?>