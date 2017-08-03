<template>
    <button
            class="btn btn-default"
            v-bind:class="{'btn-success': followed}"
            v-text="text"
            v-on:click="follow"
    >
    </button>
</template>

<script>
    export default {
        props: ['user'],
        mounted() {
            console.log(this.user);
            let _this = this;
            axios.get('/api/user/followers',{
                params: {
                  user: this.user
                }
            }).then(function (response) {
                _this.followed = response.data.followed;
            }).catch(function (error) {
                console.log(error);
            });
        },
        methods: {
          follow(){
              let _this = this;
              axios({
                  method: 'post',
                  url: '/api/user/follow',
                  data: {
                    user: this.user
                  }
              }).then(function (response) {
                  _this.followed = response.data.followed;
              }).catch(function (error) {
                  console.log(error);
              });
          }
        },
        data() {
            return {
                followed: false
            }
        },
        computed: {
            text() {
                return this.followed ? '已关注' : '关注他'
            }
        }
    }
</script>
