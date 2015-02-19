<!-- main content starts here -->
<div class="rows" ng-controller="TaskListsCtrlr">
    <div class="large-12 columns">
        <dl class="accordion" data-accordion>
          <dd class="accordion-navigation" ng-repeat="lst in task_lists">
            <a href="#tasklist-{{lst.id}}">
                {{ lst.title }}
            </a>
            <div id="tasklist-{{lst.id}}" class="content">
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
            </div>
            <script type="text/ng-template" id="editModal.html">
              <textarea ng-model="task.text">Hola</textarea>
              <button class="button" ng-click="save_edit()">OK</button>
              <a class="close-reveal-modal" ng-click="cancel_edit()">&#215;</a>
            </script>
          </dd>
        </dl>
    </div>
</div>
<!-- main content ends here -->
