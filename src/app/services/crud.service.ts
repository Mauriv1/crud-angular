import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { registro } from './registro';


@Injectable({
  providedIn: 'root'
})
export class CRUDService {
API: string='http://localhost/crudangular';
  constructor(private clienteHttp:HttpClient) { }

    agregarRegistro(datosRegistro:registro):Observable<any>{
      return this.clienteHttp.post(this.API + "?add=1", datosRegistro);
    }
}
