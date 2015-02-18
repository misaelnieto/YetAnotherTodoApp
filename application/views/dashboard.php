<!-- main content starts here -->
<div class="rows" ng-controller="TaskLists">
    <div class="large-12 columns">
        <dl class="accordion" data-accordion>
          <dd class="accordion-navigation" ng-repeat="tsk_lst in task_lists">
            <a href="#tasklist-{{tsk_lst.id}}">
                {{ tsk_lst.title }}
            </a>
            <div id="tasklist-{{tsk_lst.id}}" class="content">
                <table>
                  <thead>
                    <tr>
                      <th width="800">
                        Tarea
                      </th>
                      <th class="mark-button">Marcar como terminada</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="tsk in tsk_lst.tasks">
                      <td>
                        {{tsk.text}}
                      </td>
                      <td>
                        <a href="#" class="button tiny" title="Marcar la tarea como terminada"><i class="foundicon-checkmark"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </dd>
        </dl>
    </div>
</div>
<!-- main content ends here -->
