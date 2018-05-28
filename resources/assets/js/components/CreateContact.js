import React, {Component} from 'react';




class CreateContact extends Component {
    constructor(props){
        super(props);
        this.state = {contactNom:'', contactPrenom: ''};



    }



    render() {
        return (


                            <form>
                                <div className="form-group">
                                    <label htmlFor="nom">Nom</label>
                                    <input type="text" className="form-control" id="nom" placeholder="Entre votre Nom"/>
                                </div>

                                <div className="form-group">
                                    <label htmlFor="prenom">Prénom</label>
                                    <input type="text" className="form-control" id="prenom" placeholder="Entre votre Prenom"/>
                                </div>
                                    <button type="submit" className="btn btn-primary">Submit</button>
                            </form>

        )
    }
}
export default CreateContact;