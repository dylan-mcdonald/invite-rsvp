import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {Login} from "../classes/login";
import {LoginStatus} from "../classes/login-status";
import {Status} from "../classes/status";

@Injectable()
export class LoginService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private loginUrl = "api/login/";

	login(login: Login) : Observable<Status> {
		return(this.http.post(this.loginUrl, login)
			.map(this.extractMessage)
			.catch(this.handleError));
	}

	isLoggedIn() : Observable<LoginStatus> {
		return(this.http.get(this.loginUrl)
			.map(this.extractData)
			.catch(this.handleError));
	}
}
