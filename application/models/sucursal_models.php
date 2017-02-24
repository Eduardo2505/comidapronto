<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sucursal_models extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function update($id, $data) {

        $this->db->where('idSucursal', $id);
        return $this->db->update('sucursal', $data);
    }

    function insertar($data) {
        $this->db->insert('sucursal', $data);
    }

    function delete($id) {

        $this->db->where('idSucursal', $id);
        return $this->db->delete('sucursal');
    }

    function comprobaremail($email) {
        $this->db->where('estado', 1);
        $this->db->where('email', $email);
        $query = $this->db->get('sucursal');
        return $query;
    }

    function buscar($id) {
        $this->db->where('estado', 1);
        $this->db->where('idSucursal', $id);
        $query = $this->db->get('sucursal');
        return $query;
    }

    function comprobarContrasena($id, $pass) {
        $this->db->where('estado', 1);
        $this->db->where('idSucursal', $id);
        $this->db->where('contrasena', $pass);
        $query = $this->db->get('sucursal');
        return $query;
    }

    function login($email, $password) {
        $this->db->where('estado', 1);
        $this->db->where('contrasena', $password);
        $this->db->where('email', $email);
        $query = $this->db->get('sucursal');
        return $query;
    }

    function getMostrarlimit($offset,$limite) {
        $this->db->limit($limite,$offset);
        $this->db->order_by("posicion", "asc"); 
        $this->db->where('estado', 1);
        $query = $this->db->get('sucursal');
        return $query;
    }
     function getMostrar() {
        $this->db->where('estado', 1);
        $query = $this->db->get('sucursal');
        return $query->num_rows();
    }

    function getfiltro($strig, $orden, $idColonia) {
        $query = $this->db->query("SELECT 
    s.idSucursal AS id,
    s.Sucursal AS Sucursal,
    s.url AS url,
    s.direccion AS direccion,
    s.Numero AS numero,
    s.delgSucursal AS delgSucursal,
    s.colSucursal AS colSucursal,
    s.telefono AS telefono,
    p.Pais AS Pais,
    s.palabrasClaves AS palabrasClaves,
    s.EntregaAprox AS EntregaAprox,
    s.costoenvio AS costoenvio,
    s.pedidominimo AS pedidominimo,
    c.Nombre AS Nombre,
    s.envioGratis as ap,
    s.disponiblerecoger as bp,
    s.pagoenLinea as cp,
    s.aceptobonos as dp,
    s.promociones as dpr
FROM
    sucursal s,
    pais p,
    cadena c,colsucural cols
WHERE
    c.idCadena = s.idCadena  and cols.idSucursal = s.idSucursal and cols.idColonias=$idColonia
        AND s.pais_idpais = p.idpais
        AND s.estado = 1 and $strig=1 order by $orden"); //limit 0,20
        return $query;
    }

    function getfiltronavegar($strig, $orden) {
        $query = $this->db->query("SELECT 
    s.idSucursal AS id,
    s.Sucursal AS Sucursal,
    s.url AS url,
    s.direccion AS direccion,
    s.Numero AS numero,
    s.delgSucursal AS delgSucursal,
    s.colSucursal AS colSucursal,
    s.telefono AS telefono,
    p.Pais AS Pais,
    s.palabrasClaves AS palabrasClaves,
    s.EntregaAprox AS EntregaAprox,
    s.costoenvio AS costoenvio,
    s.pedidominimo AS pedidominimo,
    c.Nombre AS Nombre,
    s.envioGratis as ap,
    s.disponiblerecoger as bp,
    s.pagoenLinea as cp,
    s.aceptobonos as dp,
    s.promociones as dpr
FROM
    sucursal s,
    pais p,
    cadena c,colsucural cols
WHERE
    c.idCadena = s.idCadena  and cols.idSucursal = s.idSucursal 
        AND s.pais_idpais = p.idpais
        AND s.estado = 1 $strig group by s.idSucursal order by $orden "); //limit 0,20
        return $query;
    }

    function getMostrarSurcursales($idcolo) {
        $SsQL = "SELECT 
    s.idSucursal AS id,
    s.Sucursal AS Sucursal,
    s.url AS url,
    s.direccion AS direccion,
    s.Numero AS numero,
    s.delgSucursal AS delgSucursal,
    s.colSucursal AS colSucursal,
    s.telefono AS telefono,
    p.Pais AS Pais,
    s.palabrasClaves AS palabrasClaves,
    s.EntregaAprox AS EntregaAprox,
    s.costoenvio AS costoenvio,
    s.pedidominimo AS pedidominimo,
    c.Nombre AS Nombre,
    s.envioGratis as ap,
    s.disponiblerecoger as bp,
    s.pagoenLinea as cp,
    s.aceptobonos as dp,
    s.promociones as dpr
FROM
    sucursal s,
    pais p,
    cadena c,
    colsucural cols
WHERE
    c.idCadena = s.idCadena
        and cols.idSucursal = s.idSucursal
        AND s.pais_idpais = p.idpais
        AND s.estado = 1
        and cols.idColonias=$idcolo order by s.posicion";

        $query = $this->db->query($SsQL); //limit 0,20
        return $query;
    }

    function getMostrarSurcursalesfull() {
        $SsQL = "SELECT 
    s.idSucursal AS id,
    s.Sucursal AS Sucursal,
    s.url AS url,
    s.direccion AS direccion,
    s.Numero AS numero,
    s.delgSucursal AS delgSucursal,
    s.colSucursal AS colSucursal,
    s.telefono AS telefono,
    p.Pais AS Pais,
    s.palabrasClaves AS palabrasClaves,
    s.EntregaAprox AS EntregaAprox,
    s.costoenvio AS costoenvio,
    s.pedidominimo AS pedidominimo,
    c.Nombre AS Nombre,
    s.envioGratis as ap,
    s.disponiblerecoger as bp,
    s.pagoenLinea as cp,
    s.aceptobonos as dp,
    s.promociones as dpr
FROM
    sucursal s,
    pais p,
    cadena c,
    colsucural cols
WHERE
    c.idCadena = s.idCadena
        and cols.idSucursal = s.idSucursal
        AND s.pais_idpais = p.idpais
        AND s.estado = 1 group by s.idSucursal order by s.posicion";
//echo $SsQL;
        $query = $this->db->query($SsQL); //limit 0,20
        return $query;
    }

    function getSurcursalesComida($tipo,$idcolo,$sucursal) {
        $SsQL = "SELECT 
    s.idSucursal AS id,
    s.Sucursal AS Sucursal,
    s.url AS url,
    s.direccion AS direccion,
    s.Numero AS numero,
    s.delgSucursal AS delgSucursal,
    s.colSucursal AS colSucursal,
    s.telefono AS telefono,
    p.Pais AS Pais,
    s.palabrasClaves AS palabrasClaves,
    s.EntregaAprox AS EntregaAprox,
    s.costoenvio AS costoenvio,
    s.pedidominimo AS pedidominimo,
    c.Nombre AS Nombre,
    s.envioGratis as ap,
    s.disponiblerecoger as bp,
    s.pagoenLinea as cp,
    s.aceptobonos as dp,
    s.promociones as dpr
FROM
    sucursal s,
    pais p,
    cadena c,
    colsucural cols
WHERE
    c.idCadena = s.idCadena
        and cols.idSucursal = s.idSucursal
        AND s.pais_idpais = p.idpais
        AND s.estado = 1 and s.Frases like '%$tipo%' and cols.idColonias like '%$idcolo%' and s.idSucursal like '%$sucursal%'  group by s.idSucursal";
       
        $query = $this->db->query($SsQL); //limit 0,20
        return $query;
    }

}