var YetAnotherTodoApp = angular.module('YetAnotherTodoApp', ['mm.foundation']);

YetAnotherTodoApp.controller('TaskListsCtrlr', function ($scope, $modal, $rootScope, $http) {
    'use strict';
    $rootScope.task_lists = [];

    $http.get('/api/lists').success(function (response) {
        $rootScope.task_lists = response.data;
    });

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

        t.completed = 1;
        $http.post('/api/task', t)
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

YetAnotherTodoApp.controller('EditTaskModalCtrlr', function ($scope, $modalInstance, task, $http) {
    'use strict';
    $scope.task = task;

    $scope.save_edit = function () {
        $http.post('/api/task', $scope.task).success(function (response) {

        });
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

        // modalInstance.result.then(function(title) {
        //     console.log('nueva lista de tareas con titulo: ', title);
        // }, function() {});
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

YetAnotherTodoApp.controller('NewTaskListModalCtrlr', function ($scope, $modalInstance, $http, $rootScope) {
    $scope.data = {'title' : ''};
    $scope.add_tasklist = function () {
        $http.put('/api/lists/', $scope.data).success(function (response) {
            $rootScope.task_lists.push(response.data);
            $rootScope.task_lists = $rootScope.task_lists.sort(function (a, b) {
                return a.id - b.id
            }); 
        });

        $modalInstance.close();
    }
    $scope.cancel_add = function () {
        $modalInstance.dismiss('cancel');
    }
});

YetAnotherTodoApp.controller('NewTaskModalCtrlr', function ($scope, $modalInstance, $http, $rootScope) {
    $scope.task_lists = $rootScope.task_lists;
    $scope.data = {task_list_id: null, text : ''};
    $scope.add_task = function () {
        $scope.data.task_list_id = parseInt($scope.data.task_list_id);
        $http.put('/api/task', $scope.data).success(function (response) {
            var t = _.find($rootScope.task_lists, function(t) { return t.id == response.data.task_list_id});
            t.tasks.push(response.data);
            t.tasks = t.tasks.sort(function (a, b) { return a.id - b.id; });
        });
        $modalInstance.close();
    };
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
});
