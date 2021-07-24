<template>
    <div class="edit-task">
        <div class="container justify-content-left">
            <div class="row">
                <!-- Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="">Nom de la tâche</label>
                                    <textarea v-if="taskToEdit" v-model="taskToEdit.nom" name="name" id="name" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button v-on:click="editTask" type="submit" class="btn btn-success" data-dismiss="modal">Modifier ma tâche</button>
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
        editTask() {
            axios.post('http://localhost:8000/edit-task/' + this.taskToEdit.id, {
                nom: this.taskToEdit.nom
            })
            .then(async res => {
                const data = await res.data['data']
                this.$emit('updated-task', data)
                this.$emit('info-task', 'Tâche modifiée')
            })
            .catch(err => console.log(err))
        }
    },
}
</script>

<style>

</style>
