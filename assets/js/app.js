var YetAnotherTodoApp = angular.module('YetAnotherTodoApp', []);

YetAnotherTodoApp.controller('TaskLists', function ($scope) {
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
                id: 1,
                text: ' This is longer content Donec id elit non mi porta gravida at eget metus. ',
                created: '',
                updated: ''
            },
            {
                id: 2,
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
                id: 1,
                text: 'Crear API REST',
                created: '',
                updated: ''
            },
            {
                id: 2,
                text: 'Instalar servidor de bases de datos.',
                created: '',
                updated: ''
            },
        ]
    }
  ];
});
