<?php use_helper('opAsset') ?>
<?php op_smt_use_stylesheet('/opMessagePlugin/css/smt-message.css', 'last') ?>
<?php op_smt_use_javascript('/opMessagePlugin/js/jquery.timeago.js', 'last') ?>
<?php op_smt_use_javascript('/opMessagePlugin/js/smt-message.js', 'last') ?>

<?php if (0 === count($threads)): ?>
  <?php echo __('There are no messages') ?>
<?php else: ?>

<div class="row">
  <div class="gadget_header span12"><?php echo __('Read messages') ?></div>
</div>
<?php foreach ($threads as $thread): ?>
<?php if ($thread->message->isUnread($sf_user->getMemberId())): ?>
<div class="message-wrapper row message-unread">
<?php else: ?>
<div class="message-wrapper row">
<?php endif ?>
  <div class="span2">
    <?php echo link_to(op_image_tag_sf_image($thread->member->getImageFileName(), array('size' => '48x48')), '@obj_member_profile?id='.$thread->member->id) ?>
  </div>
  <div class="span7">
    <p><?php echo link_to($thread->member->name, '@obj_member_profile?id='.$thread->member->id) ?></p>
    <p><?php echo link_to($thread->message->subject, '@messageChain?id='.$thread->member->id.'#submit-wrapper') ?></p>
  </div>
  <div class="span3">
    <p class="timeago" title="<?php echo $thread->message->created_at ?>"></p>
  </div>
</div>
<hr class="toumei" />
<?php endforeach ?>
<?php endif ?>
