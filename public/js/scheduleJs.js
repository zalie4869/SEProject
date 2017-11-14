const MONTHS = ['January','February','March','April','May','June','July','August','September','October','November','December'];
const DAYS = 
["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

const ICONS = ["glyphicon-remove-sign", "glyphicon-question-sign", "glyphicon-ok-sign", "glyphicon-hourglass"];

const voteHandler = new VoteHandler;

const MonthsRow = React.createClass({
  render() {
    let monthsHtml = [<th key="0"></th>];

    let key = 1;
    for (let month of this.props.months) {
      monthsHtml.push( <th key={key} colSpan={month[1]} className="month open-bottom">{month[0]}</th> );
      key += 1;                    
    }
    
    return <tr>
      {monthsHtml}
    </tr>;
  }
});

const DaysRow = React.createClass({
  render: function() {
    let key = 0;
    let daysHtml = [<th key={key}></th>];
    
    for ( let day of this.props.days ) {
      key++;    
      daysHtml.push(
        <th key={key} className="open-top monospace">
          {day.split(" ")[0]}<br/>{day.split(" ")[1]}
        </th>
      );
    }
    return <tr>
      {daysHtml}                    
    </tr>;
  } 
});

const DatesSection = React.createClass({
  readyMonthsAndDays: function() {
    this.months = [];
    this.days = [];
    
    for (let date of this.props.dates) {
      date = new Date(date);
      let month = MONTHS[date.getMonth()];
      //months are stored as 2d array like[[month,colspan]...]
      let isSameAsPrevMonth;
      if (this.months.length)
        isSameAsPrevMonth = month != this.months[this.months.length-1][0];
      let shouldAddNewMonth =  ! this.months.length || isSameAsPrevMonth;
      if(shouldAddNewMonth)
        this.months.push([month, 1]);
      else {
        // increment colspan
        this.months[this.months.length-1][1] += 1;
      }
      this.days.push(
        DAYS[date.getDay()]+" "+date.getDate()
      );
    }
  },
  render: function() {
    this.readyMonthsAndDays();    
    return <thead>
      <MonthsRow months={this.months}/> 
      <DaysRow days={this.days}/> 
    </thead>;
  }
});

const VotesRow = React.createClass({
  render: function() {
    let key = 0;
    let votesHtml = [<th key={key} className="voter-name">{this.props.name}</th>];
    for (let vote of this.props.votes) {
      votesHtml.push(<td key={key+=1} className={"vote-"+vote}>{vote}</td>);
    }
    return <tr>
      {votesHtml}
      <td><div onClick={this.props.onEdit} className="glyphicon glyphicon-pencil btn edit-votes-btn"></div></td>
      <td><div onClick={this.props.onDelete} className="glyphicon glyphicon-trash btn delete-votes-btn"></div></td>
    </tr>;
  }
});

const NewVotesRow = React.createClass({
  getInitialState: function() {
    return {
      personName: '',
      votes: this.getInitialVotes(),
      canBeInitialized: true,
    };
  },

  componentWillReceiveProps: function(nextProps) {
    if (
      nextProps.preExistingPerson == undefined
      || this.state.canBeInitialized == false
    ) return;
    
    this.setStateToPreExistingPerson(nextProps.preExistingPerson);
    this.state.canBeInitialized = false;
    this.setState(this.state);
  },

  getInitialVotes: function() {
  	const INITIAL_VOTE_VAL = 3;

  	let votes = [];
  	for (var i = 0; i < this.props.numCols; i++)
  		votes.push(INITIAL_VOTE_VAL);
  	
  	return votes;
  },

  handlePersonNameChange: function(e) {
    this.state.personName = e.target.value;
    this.setState(this.state);    
    this.props.updateParent(this.state);
  },

  handleVoteChange: function(voteIndex, e) {
  	let votes = this.state.votes;
    votes[voteIndex] = voteHandler.cycle(votes[voteIndex]);
    
    this.setState(this.state); 
    this.props.updateParent(this.state);
  },

  setStateToPreExistingPerson: function(preExistingPerson) {
    this.state.personName = preExistingPerson.personName;    
    this.state.votes = preExistingPerson.votes.map(function (vote) { return vote; });    
    
    this.setState(this.state);
  },
  
  getPersonForFirebaseNameFromState: function() {
    return this.state.personName;
  },

  render: function() {
    var personName = this.state.personName;    
    let Html = [
      <td className="person-name" key="0">
        <input 
          name="personName" 
          onChange={this.handlePersonNameChange} 
          placeholder="Your Name" 
          value={personName}
        />
      </td>
    ];
    for (var i = 0; i < this.props.numCols; i++) {
      let voteValue = this.state.votes[i];
      let statusClass = "pick-" + voteValue;
      let iconClasses = "glyphicon " + ICONS[voteValue];
      let classes = statusClass + " " + iconClasses;
      Html.push(
        <td key={i+1}>
          <button 
            className={classes} 
            value={this.state.votes[i]} 
            onClick={this.handleVoteChange.bind(this, i)}>
          </button>
        </td>);
    } 
    return <tr>
      {Html}      
    </tr>;
  }
});
                     
const TotalsRow = React.createClass({
  render: function() {
     let totalsHtml = this.getTotalsHtml();
     return <tr>
       {totalsHtml}
     </tr>;
  },
  
  getTotalsHtml: function() {
     let totalsHtml = [<th key="0" className="open-right">VOTE SCORES</th>];
     this.readyTotals(); 
     let max = Math.max.apply(null, this.totals);
     let key = 1;
     for (let total of this.totals) {
       let classes = "bottom-line text-center";
       if (total == max) classes += " bolder"; 
       totalsHtml.push(<th key={key} className={classes}>{total}</th>);
       key++;
     }
     return totalsHtml;
  },
                       
  readyTotals: function() {
    this.totals = Array
      .apply(null, {length: this.props.numCols})
      .map(() => 0);
    let people = this.props.people;
    for (let name in people) {
      for (var i = 0; i < people[name]['votes'].length; i++) {
        let voteVal = people[name]['votes'][i];
        this.totals[i] += voteHandler.getPointVal(voteVal);
      }
    }
  }
});
                     
const VotesSection = React.createClass({
  getInitialState: function() {
    return {
      preExistingPerson: null
    };
  },
  onDelete: function(name) {
    if (!confirm ("Are you sure you want to delete " + name + "from the results?"))
      return;    
    this.props.deletePersonFromDatabase(name);
  },
  onEdit: function(name) {
    var person = this.props.people[name];
    this.state.preExistingPerson = {
      personName: name,
      votes: person.votes
    };
    this.setState(this.state);
    // this.props.deletePersonFromDatabase(name);
  },
  
  render: function() {
    let Html = [];
    let key = 0;
    let peopleHaveVoted = !Object.is(this.props.people,{});
    
    if(peopleHaveVoted) {
      for (var name in this.props.people) {
        Html.push(
          <VotesRow 
            onDelete={this.onDelete.bind(this, name)} 
            onEdit={this.onEdit.bind(this, name)} 
            key={key+=1} 
            name={name} 
            votes={this.props.people[name].votes}
          />
        );
      } 
      Html.push(
        <NewVotesRow 
          updateParent={this.props.updateParent} 
          key={key+=1} 
          numCols={this.props.numCols} 
          preExistingPerson={this.state.preExistingPerson}
        />
      );
      Html.push(
        <TotalsRow 
          key={key+=1} 
          people={this.props.people} 
          numCols={this.props.numCols}
        />
      );               
    }
    
    return <tbody>
      {Html}
    </tbody>
  },
});

const DatePicker = React.createClass({
  getInitialState: function() {
    return {
      dates: [],
      people: [],
      type: '',
      newPerson: {
        name: '',
        votes: []
      }
    };
  },
  
  mixins: [ReactFireMixin],

  componentWillMount: function() {
    this.firebaseRef = new Firebase("https://disputed.firebaseio.com/data/");
    this.firebaseRef.on('value', function updateState(dataSnapshot) {
      let data = dataSnapshot.val();

      this.setState({
        dates: data.dates,
        people: data.people,
        type: data.type
      });
    }.bind(this));
  },
  
  handleSubmit: function() {
  	//todo: validate votes?
  	
    this.addPersonToDatabase();
  },
  
  getPersonForFirebase: function() {
    let data = {};
    data['votes'] = this.getVotes();
    let person = {};    
    person[this.state.newPerson.personName] = data;
    return person;
  },
  
  getVotes: function() {
    return this.state.newPerson.votes;
  },
  
  addPersonToDatabase: function() {
    let person = this.getPersonForFirebase();
    let people = this.firebaseRef.child("people");
    people.update(person);
  },
  
  updatePersonInState: function(person) {
    this.state.newPerson = person;
    this.setState(this.state);
  },
  
  deletePersonFromDatabase: function(name) {
    let people = this.firebaseRef.child("people");
    let person = people.child(name);
    person.remove();
  },
  
  render: function() {
    return <div>
      <div className="table-container center-children">
        <table>
          <DatesSection dates={this.state.dates} />
          <VotesSection 
            deletePersonFromDatabase={this.deletePersonFromDatabase}
            updateParent={this.updatePersonInState} 
            people={this.state.people} 
            numCols={this.state.dates.length}
          />
        </table>
      </div>
      <div className="center-children">
        <button 
          className="button submit-button" 
          onClick={this.handleSubmit}
        >
          Submit Availability
        </button>
      </div>        
    </div>;
  }
});

React.render(<DatePicker />, document.getElementById('datePicker'));

// helper object constructors

function VoteHandler() {
	const UNDECIDED_VOTE = 3;
	const YES_VOTE = 2;
	const MAYBE_VOTE = 1;
	const NO_VOTE = 0;

	const VOTE_VALUES = [
	  UNDECIDED_VOTE, YES_VOTE, MAYBE_VOTE, NO_VOTE
	];

	return {
		getDefault: function() {
			return UNDECIDED_VOTE;
		},
		cycle: function(vote) {
			var voteIndex = VOTE_VALUES.indexOf( + vote);

			if ( ! ~ voteIndex) 
				throw new Error('vote value invalid');

			return voteIndex < VOTE_VALUES.length - 1
				? VOTE_VALUES[voteIndex + 1]
				: VOTE_VALUES[0];
		},
		getPointVal: function(vote) {
			if (vote == UNDECIDED_VOTE) return 0;

			return vote / 2;
		}
	}
}   