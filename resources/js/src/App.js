import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import Home from './components/Home';
import Create from './components/Create';
import Edit from './components/Edit';
import Landing from './components/Landing';

const App = () => {
	return (
		<Router className="App__container">
			<Switch>
				<Route exact path="/">
					<Landing />
				</Route>
				<Route exact path="/home">
					<Home />
				</Route>
				<Route exact path="/create">
					<Create />
				</Route>
				<Route exact path="/edit/:id">
					<Edit />
				</Route>
			</Switch>
		</Router>
	);
};

ReactDOM.render(<App />, document.getElementById('app'));
