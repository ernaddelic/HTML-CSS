var firstName = 'Bob';

var per = {
  firstName: 'John',
  lastName: 'Smith',
  getFullname: function () {
    var that = this;
    console.log(this.firstName + ' ' + this.lastName);

    function greet () {
      console.log('Hi ' + that.firstName);
    }

    greet();

  }
};

var per1 = {
  firstName: 'Nick',
  lastName: 'Doe'
};

per1.getFullname = per.getFullname;

per.getFullname();
per1.getFullname();
