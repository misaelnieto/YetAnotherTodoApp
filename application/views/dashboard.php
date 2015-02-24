<!-- main content starts here -->
<div class="rows" ng-controller="TaskListsCtrlr">
    <div class="large-12 columns">
        <accordion close-others="oneAtATime">
            <accordion-group heading="{{ lst.title }}" ng-repeat="lst in task_lists" is-open="false">
                  <table>
                    <thead>
                      <tr>
                        <th width="800">
                          Tarea
                        </th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-repeat="tsk in lst.tasks">
                        <td>
                          {{tsk.text}}
                        </td>
                        <td>
                          <a href="#" class="button tiny" title="Marcar la tarea como terminada"
                             ng-click="task_completed(lst.id, tsk.id)">
                            <i class="foundicon-checkmark">Terminada</i>
                          </a>
                        </td>
                        <td>
                          <a href="#" class="button tiny" title="Editar"
                             ng-click="task_edit(lst.id, tsk.id)">
                            <i class="foundicon-edit">Editar</i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>                
            </accordion-group>
        </accordion>
    </div>
</div>
<script type="text/ng-template" id="TaskEditModal.html">
    <a class="close-reveal-modal" ng-click="cancel_edit()">&#215;</a>
    <textarea ng-model="task.text">Hola</textarea>
    <button class="button" ng-click="save_edit()">OK</button>
</script>
<!-- main content ends here -->
