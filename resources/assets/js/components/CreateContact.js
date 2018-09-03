import React, {Component} from 'react';

export default class CreateContact extends Component {
    constructor(props){
        super(props);
        this.state = {contactNom:'', contactPrenom: ''};
    }

    render() {
        return (
            <form>
                <div className="form-group">
                    <label htmlFor="nom">Nom</label>
                    <input type="text" className="form-control" id="nom" placeholder="Nom ou organisation"/>
                </div>

                <div className="form-group">
                    <label htmlFor="objet">Prénom</label>
                    <input type="text" className="form-control" id="objet" placeholder="Objet"/>
                </div>
                <div className="form-group">
                    <label htmlFor="message">Message</label>
                    <textarea className="form-control" id="message" rows="3" placeholder="Message..."></textarea>
                </div>
                    <button type="submit" className="btn btn-primary">Envoyer</button>
            </form>
        )
    }
}