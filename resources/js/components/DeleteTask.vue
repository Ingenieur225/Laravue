<template>
    <div class="edit-task">
        <div class="container justify-content-left">
            <div class="row">
                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Voulez-vous supprimer cette tâche ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button v-on:click="deleteTask" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: ['taskToEdit'],

    methods: {
        deleteTask() {
            axios.get('http://localhost:8000/delete-task/' + this.taskToEdit.id)
            .then(async res => {
                const data = await res.data['data']
                this.$emit('updated-task', data)
                this.$emit('info-task', 'Tâche supprimée')
            })
            .catch(err => console.log(err))
        }
    },
}
</script>

<style>

</style>
