<template>
    <div class="task">
        <div class="container">
            <div v-if="info" class="alert alert-success">
                <div class="row">
                    <div class="col-10">
                        <p class="text-left">{{info}}</p>
                    </div>
                    <div class="col-2">
                        <button v-on:click="action" type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: 1px solid #444; border-radius: 2px; padding: 2px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <AddTask @new-task="refresh" @info-task="passInfo" />
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <input v-model="search" type="text" class="form-control mt-5" @keyup="searchItem" placeholder="Rechercher une tâche">
                    </div>
                </div>
            </div>
            <div class="row">
                <div v-if="tasks" class="col-12">
                    <div class="dropdown-item" v-for="task in tasks" :key="task.id">
                        <div class="row">
                            <div class="col-md-8">{{task.nom}}</div>
                            <div class="row">
                                <div class="col-md-4 mx-1">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" v-on:click="show(task.id)">Editer</button>
                                    <EditTask :taskToEdit="taskToEdit" @updated-task="refresh" @info-task="passInfo" />
                                </div>
                                <div class="col-md-4 mx-1">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" v-on:click="show(task.id)">Supprimer</button>
                                    <DeleteTask :taskToEdit="taskToEdit" @updated-task="refresh" @info-task="passInfo" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <p class="text-center">Aucune tâche trouvée</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AddTask from './AddTask';
import EditTask from './EditTask';
import DeleteTask from './DeleteTask';
import axios from "axios";

export default {
    components: {AddTask, EditTask, DeleteTask},
    data() {
        return {
            tasks: null,
            taskToEdit: null,
            info: null,
            search: ''
        }
    },

    // Created est utilisé pour les appels depuis le serveur
    created() {
        axios.get('http://localhost:8000/task-list')
        .then(async res => {
            const data = await res.data
            this.tasks = data
        })
        .catch(err => console.log(err))
    },

    methods: {
        refresh(data) {
            this.tasks = data
        },

        passInfo(data) {
            this.info = data
        },

        show(taskId) {
            axios.get('http://localhost:8000/show-task/' + taskId)
            .then(async res => {
                const data = await res.data['data']
                this.taskToEdit = data
            })
            .catch(err => console.log(err))
        },

        searchItem() {
            axios.post('http://localhost:8000/search-task', {
                nom: this.search
            })
            .then(async res => {
                const data = await res.data['data']
                this.tasks = data
            })
            .catch(err => console.log(err))
        },
    },
}
</script>

<style>
    [v-cloak] {display: none}
</style>
