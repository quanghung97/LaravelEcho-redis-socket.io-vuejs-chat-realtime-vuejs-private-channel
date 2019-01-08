<template>
	<div class="lounge">
		<div class="container">
            <div class="row" style="margin-top: 50px;">
                Current user: <b>{{ $root.currentUserLogin.name }}</b>
            </div>
            <div class="row" style="margin-top: 30px;">
                Role: <b>{{ $root.currentUserLogin.role }}</b>
            </div>
			<div class="row" style="margin-top: 100px;">
				<div class="col-md-6" v-for="chatroom in chatrooms">
					<div class="card" style="width: 18rem;">
					  	<div class="card-body">
						    <h5 class="card-title">{{ chatroom.name }}</h5>
						    <p class="card-text">{{ chatroom.description }}</p>
						    <router-link class="btn btn-primary" :to="`/chatroom/${chatroom.id}`">Join</router-link>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				chatrooms: [
					{
						id: 1,
						name: 'Chatroom 1',
						description: 'Join me and have fun'
					},
					{
						id: 2,
						name: 'Chatroom 2',
						description: 'Join me and have fun'
					}
				]
			}
		},
	}
</script>

<style lang="scss" scoped>
</style>
