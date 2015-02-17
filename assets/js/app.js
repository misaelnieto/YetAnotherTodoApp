var YetAnotherTodoApp = angular.module('YetAnotherTodoApp', []);

YetAnotherTodoApp.controller('PhoneListCtrl', function ($scope) {
  $scope.task_lists = [
    {
        'title': 'Default',
        'tasks': [
            {
                id: 1,
                'text': 'Lorem ipsum'
                'created': '',
                'updated': ''
            },
            {
                id: 2,
                'text': 'Lorem ipsum'
                'created': '',
                'updated': ''
            },
        ]
    },
  ];
});