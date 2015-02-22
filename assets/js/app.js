var YetAnotherTodoApp = angular.module('YetAnotherTodoApp', ['mm.foundation']);

YetAnotherTodoApp.controller('TaskListsCtrlr', function ($scope, $modal) {
    'use strict';
    $scope.task_lists = [
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
            templateUrl: 'editModal.html',
            controller: 'EditModalCtrlr',
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

YetAnotherTodoApp.controller('EditModalCtrlr', function ($scope, $modalInstance, task) {
    'use strict';
    $scope.task = task;

    $scope.save_edit = function () {
        $modalInstance.close($scope.text);
    }
    $scope.cancel_edit = function () {
        $modalInstance.dismiss('cancel');
    }
});