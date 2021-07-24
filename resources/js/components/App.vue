<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                    <router-link class="navbar-brand" to="/">Laravue</router-link>
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <router-link class="nav-link" to="/">Home</router-link>
                            </li>
                            <li class="nav-item dropdown">
                                <router-link class="nav-link" to="/task">Liste des tâches</router-link>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    
}
</script>

<style>

</style>
