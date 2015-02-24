var YetAnotherTodoApp = angular.module('YetAnotherTodoApp', ['mm.foundation']);

YetAnotherTodoApp.factory('TodoAPI', ['$resource', 
    function ($resource) {
        return $resource ('api/');
}]);

YetAnotherTodoApp.controller('TaskListsCtrlr', function ($scope, $modal, $rootScope) {
    'use strict';
    $rootScope.task_lists = [
    {

        'id':0,
        'title': 'Default',
        'tasks': [
            {
                id: 1,
                text: 'Lorem ipsum 1',
                created: '',
                updated: ''
            },
            {
                id: 2,
                text: 'Lorem ipsum 2',
                created: '',
                updated: ''
            },
        ]
    },
    {
        'id':1,
        'title': 'Tareas de casa',
        'tasks': [
            {
                id: 3,
                text: ' This is longer content Donec id elit non mi porta gravida at eget metus. ',
                created: '',
                updated: ''
            },
            {
                id: 4,
                text: 'Panda german iron man top bear star wars no bad ',
                created: '',
                updated: ''
            },
        ]
    },
    {
        'id':2,
        'title': 'Tareas del trabajo',
        'tasks': [
            {
                id: 5,
                text: 'Crear API REST',
                created: '',
                updated: ''
            },
            {
                id: 6,
                text: 'Instalar servidor de bases de datos.',
                created: '',
                updated: ''
            },
        ]
    }
    ];

    $scope.task_completed = function (list_id, task_id) {
        var tsklst_idx =0;
        var tsk_idx =0;
        var l = _.find($scope.task_lists, function(tl, index) {
                tsklst_idx = index;
                return tl.id == list_id;
            });
        var t = _.find(l.tasks, function (tsk, index){
                tsk_idx = index;
                return tsk.id == task_id;
            });
        $scope.task_lists[tsklst_idx].tasks.splice(tsk_idx, 1);
    };

    $scope.task_edit = function (list_id, task_id) {
        var tsklst_idx =0;
        var tsk_idx =0;
        var l = _.find($scope.task_lists, function(tl, index) {
                tsklst_idx = index;
                return tl.id == list_id;
            });
        var t = _.find(l.tasks, function (tsk, index){
                tsk_idx = index;
                return tsk.id == task_id;
            });
        var old_text = t.text;
        var modalInstance = $modal.open({
            templateUrl: 'TaskEditModal.html',
            controller: 'EditTaskModalCtrlr',
            resolve: {
                task: function () {
                    return t;
                }
            }
        });
        modalInstance.result.then(function () {
            console.log('Save text using API');
        }, function () {
            console.log('Restaura');
            t.text = old_text;
        });
    };
});

YetAnotherTodoApp.controller('EditTaskModalCtrlr', function ($scope, $modalInstance, task) {
    'use strict';
    $scope.task = task;

    $scope.save_edit = function () {
        $modalInstance.close($scope.text);
    }
    $scope.cancel_edit = function () {
        $modalInstance.dismiss('cancel');
    }
});

YetAnotherTodoApp.controller('OffCanvasMenuCtrlr', function ($scope, $modal) {
    $scope.createTaskList = function () {
        var modalInstance = $modal.open({
            templateUrl: 'NewTaskListModal.html',
            controller: 'NewTaskListModalCtrlr'
        });

        modalInstance.result.then(function(title) {
            console.log('nueva lista de tareas con titulo: ', title);
        }, function() {});
    };

    $scope.showNewTaskModal = function () {
        var modalInstance = $modal.open({
            templateUrl: 'NewTaskModal.html',
            controller: 'NewTaskModalCtrlr'
        });

        modalInstance.result.then(function(task) {
            console.log('nueva tarea: ', task);
        }, function() {});
    };
});

YetAnotherTodoApp.controller('NewTaskListModalCtrlr', function ($scope, $modalInstance) {
    $scope.data = {'title' : ''};
    $scope.add_tasklist = function () {
        console.log($scope.data);
        $modalInstance.close($scope.data.title);
    }
    $scope.cancel_add = function () {
        $modalInstance.dismiss('cancel');
    }
});

YetAnotherTodoApp.controller('NewTaskModalCtrlr', function ($scope, $modalInstance, $rootScope) {
    $scope.task_lists = $rootScope.task_lists;
    $scope.data = {tasklist_id: null, text : ''};
    $scope.add_task = function () {
        console.log($scope.data);
        $modalInstance.close($scope.data);
    };
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
});
