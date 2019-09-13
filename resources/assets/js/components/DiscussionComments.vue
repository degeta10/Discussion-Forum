<template>
  <div>
    <div v-for="comment in comments" :key="comment.id">
      <div v-if="comment.user_id != userid" class="row">
        <div class="col-md-5 other-users-message">
          <h5>
            <i class="fa fa-user"></i>
            <span>{{comment.user.name}}</span>
          </h5>
          <p>{{comment.message}}</p>
          <span class="time-left">{{comment.comment_time}}</span>
        </div>
      </div>
      <div v-if="comment.user_id == userid" class="row">
        <div class="col-md-5 offset-md-7 user-message">
          <p>{{comment.message}}</p>
          <span class="time-right">{{comment.comment_time}}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["comments", "userid", "dicussionid"],
};
</script>
