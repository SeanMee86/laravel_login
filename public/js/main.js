$(document).ready(function(){
    BuildApp();
});

function BuildApp(){

    const self = this;

    this.changeTodoStatus = function(){
        $('.complete, .delete, .reopen').on('click', function(){
            switch(this.classList[2]){
                case 'complete':
                    console.log('is complete clicked');
                    break;
                case 'delete':
                    console.log('delete clicked');
                    break;
                case 'reopen':
                    console.log('reopen clicked');
                    break;
                default:
                    console.log('not working');
            }
        });
    };

    this.applyClickHandlers = function(){
        this.changeTodoStatus();
    };

    this.applyClickHandlers();
}