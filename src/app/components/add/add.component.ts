import { Component, OnInit } from '@angular/core';
import {FormGroup, FormBuilder} from '@angular/forms';

@Component({
  selector: 'app-add',
  templateUrl: './add.component.html',
  styleUrls: ['./add.component.scss'],
})
export class AddComponent implements OnInit {
  formularioRegistro!: FormGroup;

  constructor(public formulario:FormBuilder) {
    this.formularioRegistro;
    formulario.group({
      descripcion: [''],
      codigo:['']
    });
  }

  ngOnInit(): void {
  }

  enviarDatos(): any {
    console.log("Boton Presionado");
    console.log(this.formularioRegistro.value);
  }

}
