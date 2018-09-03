import React from 'react';

export default class Images extends React.Component {
    render() {

        const { images } = this.props;

        return (
            <div className="stat">
                <div className="first">
                    <p>{ images }</p>
                </div>

                <h4>Images</h4>
                <p>Alimentent l'IA permettant de reconnaître le sujet de vos clichés</p>
            </div>
        )
    }
}