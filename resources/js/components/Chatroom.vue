<template>
  <div class="chatroom">
    <div class="container clearfix">
        <div class="people-list" id="people-list">
            <div class="go-back">
              <router-link to="/" class="btn btn-primary">Back</router-link>
            </div>
        </div>
        <div class="chat">
            <div class="chat-history">
                <ul>
                    <li class="clearfix" v-for="message in list_messages">
                        <div class="message-data" :class="message.user_id === $root.currentUserLogin.id ? 'align-right' : ''">
                            <span class="message-data-time">{{ message.created_at }}</span> &nbsp; &nbsp;
                            <span class="message-data-name" :class="message.user_id === $root.currentUserLogin.id ? 'current-user-name' : ''">{{ message.user.name }}</span> <i class="fa fa-circle me"></i>

                        </div>
                        <div class="message float-right" :class="message.user_id === $root.currentUserLogin.id ? 'my-message' : 'other-message'">
                            {{ message.message }}
                        </div>
                    </li>
                </ul>
            </div>
            <div class="chat-message clearfix">
                <textarea class="form-control" name="message-to-send" id="message-to-send" placeholder="Type your message" rows="3" v-model="message"></textarea>
                <button class="btn btn-primary" @click="sendMessage">Send</button>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        message: '',
        list_messages: []
      }
    },
    created() {
      this.loadMessage()
      window.Echo.private('chatroom.' + this.$route.params.id)
        .listen('PrivateMessage', (e) => {
            let message = e.message
            message.user = e.user
            this.list_messages.push(message)
        });
    },
    methods: {
      loadMessage() {
        axios.get('/messages?chatroom_id=' + this.$route.params.id)
          .then(response => {
              this.list_messages = response.data
          })
          .catch(error => {
            console.log(error)
          })
      },
      sendMessage() {
        axios.post('/messages', {message: this.message, chatroomId: this.$route.params.id})
          .then(response => {
            console.log('success')
            this.list_messages.push({
              message: this.message,
              created_at: new Date().toJSON().replace(/T|Z/gi,' '),
              user: this.$root.currentUserLogin,
              user_id: this.$root.currentUserLogin.id
            })
            this.message = ''
          })
          .catch(error => {
            console.log(error)
          })
      }
    }
  }
</script>

<style lang="scss" scoped>
	@import url(https://fonts.googleapis.com/css?family=Lato:400,700);
	.current-user-name {
		color: red;
	}
li {
	list-style-type: none;
}
$green: #86BB71;
$blue: #94C2ED;
$orange: #E38968;
$gray: #92959E;

*, *:before, *:after {
  box-sizing: border-box;
}

body {
  background: #C5DDEB;
  font: 14px/20px "Lato", Arial, sans-serif;
  padding: 40px 0;
  color: white;
}

.container {
  margin: 0 auto;
  width: 1000px;
  background: #00e2f9;
  border-radius: 5px;
  color: white;
}

.people-list {
  width:260px;
  float: left;

  .search {
    padding: 20px;
  }



  .fa-search {
    position: relative;
    left: -25px;
  }

  ul {
    padding: 20px;
    height: 770px;




    li {
      padding-bottom: 20px;
    }
  }

  img {
    float: left;
  }

  .about {
    float: left;
    margin-top: 8px;
  }

  .about {
    padding-left: 8px;
  }

  .status {
    color: $gray;
  }

}

.chat {
	margin-left: 100px;
  width: 490px;
  float:left;
  background: #F2F5F8;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;

  color: #434651;

  .chat-header {
    padding: 20px;
    border-bottom: 2px solid white;

    img {
      float: left;
    }

    .chat-about {
      float: left;
      padding-left: 10px;
      margin-top: 6px;
    }

    .chat-with {
      font-weight: bold;
      font-size: 16px;
    }

    .chat-num-messages {
      color: $gray;
    }

    .fa-star {
      float: right;
      color: #D8DADF;
      font-size: 20px;
      margin-top: 12px;
    }
  }

  .chat-history {
    padding: 30px 30px 20px;
    border-bottom: 2px solid white;
    overflow-y: scroll;
    height: 575px;

    .message-data {
      margin-bottom: 15px;
    }

    .message-data-time {
      color: lighten($gray, 8%);
      padding-left: 6px;
    }

    .message {
      color: white;
      padding: 18px 20px;
      line-height: 26px;
      font-size: 16px;
      border-radius: 7px;
      margin-bottom: 30px;
      width: 90%;
      position: relative;

      &:after {
        bottom: 100%;
        left: 7%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: $green;
        border-width: 10px;
        margin-left: -10px;
      }
    }

    .my-message {
      background: $green;
    }

    .other-message {
      background: $blue;

      &:after {
        border-bottom-color: $blue;
        left: 93%;
      }
    }

  }

  .chat-message {
    padding: 30px;

    textarea {
      width: 100%;
      border: none;
      padding: 10px 20px;
      font: 14px/22px "Lato", Arial, sans-serif;
      margin-bottom: 10px;
      border-radius: 5px;
      resize: none;

    }

    .fa-file-o, .fa-file-image-o {
      font-size: 16px;
      color: gray;
      cursor: pointer;

    }
  }
}

.online, .offline, .me {
    margin-right: 3px;
    font-size: 10px;
  }

.online {
  color: $green;
}

.offline {
  color: $orange;
}

.me {
  color: $blue;
}

.align-left {
  text-align: left;
}

.align-right {
  text-align: right;
}

.float-right {
  float: right;
}

.clearfix:after {
	visibility: hidden;
	display: block;
	font-size: 0;
	content: " ";
	clear: both;
	height: 0;
}
</style>
